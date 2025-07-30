<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display the profile of the logged-in user
    public function manageProfile()
    {
        // Get the currently authenticated user
        $user = Auth::user(); 

        return view('admin.manageProfile', compact('user')); // Pass the user to the view
    }

    // Update the profile of the logged-in user
    public function updateProfile(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id, // Unique except for the current user
            'password' => 'nullable|string|min:8|confirmed', // Password is optional but must be confirmed if provided
        ]);

        // Update the user's details
        $user->email = $request->input('email');

        // If a new password is provided, update it
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password')); // Hash the password
        }

        $user->save(); // Save the changes

        // Redirect back with success message
        return redirect()->route('manageProfile')->with('success', 'Profile updated successfully!');
    }
}
