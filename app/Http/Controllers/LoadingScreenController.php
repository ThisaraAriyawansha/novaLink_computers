<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoadingScreenController extends Controller
{
    // Show loading screen view
    public function show()
    {
        return view('loading');
    }

    // Simulate process and redirect
    public function process()
    {
        // Simulate delay or processing
        sleep(3); // Example: 3 seconds delay

        // After loading, redirect or show another view
        return redirect()->route('home'); // change 'home' to your route name
    }
}
