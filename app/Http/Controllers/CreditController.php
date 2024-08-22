<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditController extends Controller
{
   
        public function requestCredit(Request $request)
        {
         
            // Handle POST request to /partner
        $validated = $request->validate([
            'credit_amount' => 'required|numeric',
            'credit_reason' => 'required|string',
        ]);

        // Logic to handle the validated data
        // ...

        return redirect()->back()->with('success', 'Credit request submitted successfully.');

        }
    

}