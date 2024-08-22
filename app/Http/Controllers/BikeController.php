<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BikeController extends Controller
{
    public function create()
    {
        return view('admin.addbike');
    }

    
    public function store(Request $request)
    {
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filePath = $file->store('public/bike_images'); // Save the file to storage/app/public/bike_images
            $fileName = basename($filePath); // Get the file name
        } else {
            $fileName = null; // Set default or handle no file case
        }

        $user = Auth::user();
        DB::table('bikes')->insert([
            'name' => $request->get('name'),
            'image_url' => $fileName,
            'rate_per_hour'  => $request->get('rate_per_hour'),
            'cc'  => $request->get('cc'),
            'weight'  => $request->get('weight'),
            'description'  => $request->get('description'),
            'added_by'=>$user ->user_id
        ]);
        
        return redirect('/admin/availablebikes')->with('success', 'Bike added successfully!');

    }
    public function showAvailableBikes()
    {
        $bikes = Bike::all();
        return view('admin.availablebikes', compact('bikes'));
    }
    
    public function showbikesonuser(){
        $bikes = Bike::all();
        return view('available',compact('bikes'));
    }

   

    public function edit($id)
    {
        $bike = Bike::findOrFail($id);
        $user = Auth::user();
    
  
        if ($user->role_id == 1) {
           
            return view('admin.editbike', compact('bike'));
        }
    
        
        if ($user->user_id == $bike->added_by) {
            return view('admin.editbike', compact('bike'));
        }
    
        // Unauthorized access if the user is neither an admin nor the owner
        abort(403, 'Unauthorized action');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rate_per_hour' => 'required|numeric',
            'cc' => 'required|integer',
            'weight' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $bike = Bike::findOrFail($id);
        $bike->name = $request->input('name');
        $bike->rate_per_hour = $request->input('rate_per_hour');
        $bike->cc = $request->input('cc');
        $bike->weight = $request->input('weight');
        $bike->description = $request->input('description');

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('bike_images', 'public');
            $bike->image_url = basename($imagePath);
        }

        $bike->save();
        return redirect()->route('admin.bikes.show')->with('status', 'Bike updated successfully!');
    }

    public function destroy($id)
    {
        $bike = Bike::find($id);

        if ($bike) {
            $bike->delete();
            return redirect()->back()->with('status', 'Bike deleted successfully.');
        }

        return redirect()->back()->with('error', 'Bike not found.');
    }


}
