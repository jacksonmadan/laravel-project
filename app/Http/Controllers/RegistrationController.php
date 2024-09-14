<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\OtpMail;

class RegistrationController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Handle the registration and send OTP.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registered(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'email' => 'required|string|email|max:100|unique:user',
            'address' => 'required|string|max:100',
            'dob' => 'required|date',
            'gender' => 'required|in:M,F,O',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Generate OTP
        $otp = Str::random(6);

        // Store OTP
        Otp::updateOrCreate(
            ['email' => $request->email],
            ['otp' => $otp, 'expires_at' => Carbon::now()->addMinutes(10)]
        );

        // Send OTP email
        Mail::to($request->email)->send(new OtpMail($otp));

        // Store registration data temporarily
        session()->put('registration_data', $request->only(['name', 'email', 'address', 'dob', 'gender', 'password']));

        // Redirect to OTP verification page
        return redirect()->route('verify-otp')->with('success', 'OTP sent to your email. Please verify.');
    }

    /**
     * Show the OTP verification form.
     *
     * @return \Illuminate\View\View
     */
    public function verifyOtpForm()
    {
        return view('verify-otp');
    }

    /**
     * Handle OTP verification.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);

        // Find OTP record
        $otpRecord = Otp::where('email', $request->email)
                         ->where('otp', $request->otp)
                         ->where('expires_at', '>', Carbon::now())
                         ->first();

        if (!$otpRecord) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // OTP is valid, create the user
        $registrationData = session()->pull('registration_data');

        if (empty($registrationData)) {
            return back()->withErrors(['error' => 'No registration data found.']);
        }

        User::create([
            'name' => $registrationData['name'],
            'email' => $registrationData['email'],
            'address' => $registrationData['address'],
            'dob' => $registrationData['dob'],
            'gender' => $registrationData['gender'],
            'password' => Hash::make($registrationData['password']),
        ]);

        // Delete OTP record
        $otpRecord->delete();

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'messages' => $request->input('message'),
        ];

        // Send email
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('hello@example.com')
                    ->subject('Contact Us Form Submission')
                    ->from($data['email'], $data['name']);
        });

        return back()->with('success', 'Thank you for your message. We\'ll get back to you soon.');

    }
    public function log($email){
        $customer=User::find($email);
        return $customer;
    }

}
