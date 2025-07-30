<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make(1234));
        return view('auth.login');
    }
    public function customerHome()
    {
        // dd(Hash::make(1234));
        return view('customer.customerHome');
    }
    public function add_user()
    {
        return view('auth.register');
    }
    public function insert_user(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ], [
        'name.required' => 'Name field is required.',
        'email.required' => 'Email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'password.required' => 'Password field is required.',
        'password.min' => 'Password must be at least 8 characters.',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors(),
        ], 422); // 422 Unprocessable Entity status code for validation errors
    }

    // Create a new user instance
    $save = new User;
    $save->name = $request->name;
    $save->email = $request->email;
    $save->password = bcrypt($request->password); // Securely hash the password
    $save->save();

    // Return a JSON response
    return response()->json(['message' => 'User registered successfully!']);
}

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('admin/dashboard'); // Redirect to a common dashboard
        }

        return redirect()->back()->with('error', 'Please enter correct email and password');
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }
    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Please check your email and reset your password");

        }
        else
        {
            return redirect()->back()->with('error', "Email not found in the system.");
        }
    }
    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }
    public function PostReset($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url(''))->with('success', "password successfully reset.");

        }
        else
        {
            return redirect()->back()->with('error', "password and confirm password dose not match.");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
