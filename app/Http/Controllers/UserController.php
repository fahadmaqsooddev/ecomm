<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Jobs\SendUserRegisteredEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered; // Import the Mailable
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserController extends Controller
{
    // User registration (store method)
    public function store(UserRequest $request)
    {
        // Validate incoming request data
        $validatedData = $request->validated();

        // Create a new user instance
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']); // Hashing the password
        $user->phone_number = $validatedData['phone_number'];
        $user->address_line_1 = $validatedData['address_line_1'];
        $user->address_line_2 = $validatedData['address_line_2'];
        $user->city = $validatedData['city'];
        $user->country = $validatedData['country'];
        $user->state = $validatedData['state'];
        $user->zip_code = $validatedData['zip_code'];
        $user->verification_token = Str::random(60); // Generate a token

        // Save the user to the database
        if ($user->save()) {
            // Dispatch email notification about user registration
            SendUserRegisteredEmail::dispatch($user);
            // Redirect with success message
            return redirect()->route('userregister')->with('msg', 'Account Created! Check Your Email');
        }

        // If saving user fails, redirect with error
        return redirect()->route('userregister')->with('error', 'An error occurred while creating your account');
    }

    // Verify email token
    public function verifytoken($token)
    {
        // Find the user by the verification token
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            // If no user is found, return an error response
            return redirect()->route('userregister')->with('error', 'Invalid Token');
        }
        if ($user->is_verified) {
            return redirect()->route('userregister')->with('msg', 'Your email is already verified.');
        }

        $user->email_verified_at = now();
        $user->is_verified = true; // Update the is_verified column
        $user->save();

        // Return a success response
        return redirect()->route('userlogin')->with('msg', 'Your email has been verified.');
    }

   // User login method
    public function userlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user exists and credentials are correct using Auth::attempt
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            // Check if the user is verified using the custom 'is_verified' column
            if ($user->is_verified !== 1) {
                Auth::guard('web')->logout();
                // Redirect with a message
                return redirect()->route('userlogin')->with('error', 'Please verify your email before logging in.');
            }
            return redirect()->route('indexxxx');
            //return redirect()->intended(session('second_previous_url', route('indexxxx')));  // Fallback to home if no second previous URL
        } else {
            // Authentication failed
            return redirect()->route('userlogin')->with('error', 'The provided credentials do not match our records.');
        }
    }

    public function userorders()
    {
        $user_id = Auth::id();
        $orders = Order::with(['items', 'payment'])
                    ->where('user_id', $user_id)
                    ->latest()
                    ->get();

        return view('orders', compact('orders'));
    }

    public function getorderdetails($id){
        $user_id = Auth::id();
        $orders=Order::with(['items', 'payment'])
                ->where('id',$id)
                ->where('user_id',$user_id)
                ->get();    
        return view('view-order', compact('orders'));
    }

    // User logout method
    public function userlogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('userlogin');
    }

    // Password reset view
    public function resetpassword()
    {
        return view('reset_password');
    }
}
