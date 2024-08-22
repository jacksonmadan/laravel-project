<?php
// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Show the booking page for a specific bike
    public function show($id)
    {
        $bike = Bike::findOrFail($id); // Find the bike by ID or fail with 404 if not found

        return view('book-bike', compact('bike')); // Return the view with the bike data
    }
}
