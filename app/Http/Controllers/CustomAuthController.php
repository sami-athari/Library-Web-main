<?php

namespace App\Http\Controllers;

use App\Models\User; // Use User model instead of auches
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    // Show login form
    public function login()
    {
        return view('auth.login');
    }

    // Handle login request
    public function customLogin(Request $request)
    {
        $request->validate([
            'login' => 'required|string', // Accept either name or email
            'password' => 'required',
        ]);

        // Attempt login using either email or name
$user = User::where('email', $request->login)
    ->orWhere('name', $request->login)
    ->first();

if ($user && Hash::check($request->password, $user->password)) {
    Auth::login($user);
    // Redirect user based on role

            // Redirect user based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Signed in successfully as Admin!');
            } elseif ($user->role === 'user') {
                return redirect()->route('users.index')->with('success', 'Signed in successfully as User!');
            }
        }

        return redirect("login")->withErrors(['login' => 'Login details are not valid.']);
    }

    // Show registration form
    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users', // Use 'users' table for unique constraint
            'password' => 'required|min:6|confirmed',
        ]);

        // Create user in the 'users' table
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set default role as 'user', can be customized
        ]);

        // Automatically log the user in after registration
        Auth::login($user);

        // Flash success message
        return redirect()->route('login')->with('success', 'Registration successful! You are now logged in.');
    }

    // Show dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("auth.login")->withErrors('You do not have access.');
    }

    // Logout function
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('login')->with('success', 'Logged out successfully.');
    }
}
