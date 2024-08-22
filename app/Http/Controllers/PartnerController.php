<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
class PartnerController extends Controller
{
    public function sendRequest(Request $request)
    {  $validated = $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=> 'required||email'
    ]);

        $partner=Partner::create([
            'user_id' => auth()->id(),
            'first_name'=>$validated['first_name'],
            'last_name'=>$validated['last_name'],
            'email'=>$validated['email'],
        ]);

        return redirect()->back()->with('status', 'request sent successfully');

    }

    public function showrequest()
    {
       $partners=Partner::all();
        return view('admin.partnership',compact('partners'));
    }

    public function approve($user_id)
    { 
        $user = User::find($user_id);
        $partner = Partner::where('user_id', $user_id)->first();
        if ($partner) {
            $partner->status ='approved';
            $partner->save();
        }
        
        if ($user) {
            $user->role_id = 2; 
            $user->role="partner";
            $user->save();
        }
        session()->flash('status', 'Partner request approved successfully.'); 
        return redirect()->back();
    }


    public function decline($user_id){
        $partner = Partner::where('user_id', $user_id)->first();

         if ($partner) {
            $partner->status ='declined';
            $partner->save();
        }
        session()->flash('status', 'Partner request declined successfully.'); 
        return redirect()->back();
    }
    
    
}
