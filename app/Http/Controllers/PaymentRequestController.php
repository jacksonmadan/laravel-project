<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentRequest;
use Illuminate\Support\Facades\Mail;

class PaymentRequestController extends Controller
{
    public function create()
    {
        return view('request');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
        ]);

        $paymentRequest = PaymentRequest::create([
            'user_id' => auth()->id(),
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'status' => 'pending',
        ]);

        Mail::send('emails.payment_request', [
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'request_id' => $paymentRequest->id,
        ], function ($message) {
            $message->to('admin@example.com')->subject('New Payment Request');
        });

        return redirect()->route('payment.request.create')
                         ->with('status', 'Payment request submitted and email sent successfully.');
    }

    
    
    public function approve($id)
    {
        // Find the payment request by ID
        $paymentRequest = PaymentRequest::find($id);
    
        if (!$paymentRequest) {
            return redirect()->route('payment.index')->with('error', 'Invalid or already processed request.');
        }
    
        // Update the status to approved
        $paymentRequest->status = 'approved';
        $paymentRequest->save();
    
        session()->flash('status', 'Partner request declined successfully.');
        // Redirect back to the payment view with a success message
        return redirect()->back()->with('status', 'Payment request approved successfully.');
    }
    
    
}
