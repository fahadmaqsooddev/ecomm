<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Auth;
use Hash;
use Illuminate\Support\Facades\Cookie;
class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(AdminRequest $request)
    {
        // Get the credentials from the request
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            // Retrieve the authenticated admin details
            $admindetail = Auth::guard('admin')->user();
            if ($request->has('remember_email')) {
                Cookie::queue(
                    Cookie::make(
                        'admin_email',
                        $request->email,
                        60 * 24 * 30, // 30 days
                        null,
                        null,
                        false,
                        true // HttpOnly (IMPORTANT)
                    )
                );
            } else {
                Cookie::queue(Cookie::forget('admin_email'));
            }
            return redirect()->route('admin.dashboard'); // Change this to your dashboard route
        } else {
            return redirect('admin/login')->with('msg', 'Email or Password is incorrect');
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        // Cookie::queue(Cookie::forget('admin_email'));
        return redirect()->route('login');
    }
}
