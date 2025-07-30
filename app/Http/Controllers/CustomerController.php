<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Hash; 
use Validator; 
use Mail; 

class CustomerController extends Controller
{

    public function manageCustomer()
    { 
        $product  = Customer::paginate(10); // Paginate with 10 customers per page
        return view('admin.manageCustomer', compact('product'));
    }
    


    // Method to handle registration form submission
    public function register(Request $request)
    {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'user-name' => 'required',
            'user-password' => 'required|min:6',
            'user-email' => 'required|email|unique:customers,email',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|numeric|min:10',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create a new customer
        $customer = Customer::create([
            'username' => $request->input('user-name'),
            'password' => Hash::make($request->input('user-password')), // Hash the password
            'email' => $request->input('user-email'),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phone' => $request->input('phone'),
        ]);
    
        // Send a Thank You email using the email template
        Mail::send('emails.thank_you_email', ['username' => $customer->username], function ($message) use ($customer) {
            $message->to($customer->email)
                    ->subject('Thank You for Registering!');
        });
    
        // Add a success message to the session
        return redirect()->back()->with('success', 'Registration successful! Please log in.');
    }
    


        // Handle login logic
        public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'user-password' => 'required|min:8',
        ]);

        $customer = Customer::where('email', $validated['email'])->first();

        if ($customer && password_verify($validated['user-password'], $customer->password)) {
            // Store customer data in session
            session(['customer_id' => $customer->id, 'customer_name' => $customer->username]);
            session()->put('last_activity', time()); // Record login time

            return redirect()->back()->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['user-password' => 'Invalid email or password.']);
    }

    public function logout(Request $request)
    {
        // Clear session data
        $request->session()->flush();
    
        // Redirect to /myAcc with a success message
        return redirect('/myAcc')->with('success', 'Logged out successfully!');
    }
    
    
}
