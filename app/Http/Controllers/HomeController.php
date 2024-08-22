<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;
class HomeController extends Controller
{
    public function available()
    {
        return view('available');
    }
    
    public function address()
    {
        return view('address');
    }
    public function booknow()
    {
        $bikes = Bike::all(); // Fetch all bikes from the database
        return view('book-now', compact('bikes'));
    }
    
    public function aboutus()
    {
        return view('aboutus');
    }
    public function partner()
    {
        return view('partner');
    }
  
    public function contact()
    {
        return view('contact');
    }
}
