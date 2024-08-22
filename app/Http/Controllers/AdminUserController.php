<?php
// app/Http/Controllers/AdminUserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminUserController extends Controller
{
    public function admin_login()
    {
        return view('admin.admin_login');
    }

    public function authenticate(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->only('email', 'password');

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check if the user is an admin
            if ($user->role_id == 1 ||$user->role_id == 2 ){
                return view('admin.dashboard');
            }

            // Log out the user if they are not an admin
            Auth::logout();
            return redirect('/admin/login')->withErrors([
                'email' => 'You are not authorized to access the admin area.'
            ]);
        }

        // If authentication fails
        return redirect('/admin/login')->withErrors([
            'email' => 'Invalid credentials.'
        ]);
    }

    public function user_show()
    {       $users = User::all(); // Assuming User model is properly imported and used
        return view('admin.showuser', compact('users'));
    }

    public function edit(User $user)
    {
        // Return the edit view with the user
        return view('admin.edituser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        
        ]);
        $user->update($validatedData);
        return redirect('/admin/showuser')->with('status', 'User updated successfully!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/showuser')->with('status', 'User deleted successfully!');
    }
   
public function loginAs($user_id)
{
    $user = User::where(['user_id' => $user_id])->first();
    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    $admin_id = Auth::user();

    if ($admin_id ->user_id == 1) {
        Auth::logout();
        Auth::login($user);
        return redirect('/');
    }

    return redirect()->back()->with('error', 'You do not have permission to login as this user.');
}

public function admin_dashboard()
{
return view('admin.dashboard');
}
    
}

