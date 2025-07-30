<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Generate a unique token for this submission
        $token = md5(uniqid($request->email, true));
        $cacheKey = 'contact_submission_' . $token;

        // Check if this submission was already processed
        if (Cache::has($cacheKey)) {
            Log::warning('Duplicate contact form submission detected', ['token' => $token]);
            return response()->json(['success' => 'Your message has already been sent!']);
        }

        // Store the token in cache for 10 minutes to prevent duplicates
        Cache::put($cacheKey, true, now()->addMinutes(10));

        // Log the submission for debugging
        Log::info('Processing contact form submission', $validated);

        // Send email to the owner
        Mail::send('emails.contact', ['data' => $validated], function ($message) {
            $message->to(env('CONTACT_RECEIVER_EMAIL', 'fallback@example.com'))
            ->subject('New Contact Form Submission');
        });

        // Log email sent
        Log::info('Contact form email sent', ['to' => 'thisara.a2001@gmail.com']);

        return response()->json(['success' => 'Your message has been sent successfully!']);
    }
}