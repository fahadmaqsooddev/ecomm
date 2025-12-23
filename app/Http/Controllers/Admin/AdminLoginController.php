<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Auth;
use Hash;
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
        // echo Hash::make(123);
        // die;
        // Attempt to authenticate using the 'admin' guard
        if (Auth::guard('admin')->attempt($credentials)) {
            // Retrieve the authenticated admin details
            $admindetail = Auth::guard('admin')->user();
            return redirect()->route('admin.dashboard'); // Change this to your dashboard route
        } else {
            return redirect('admin/login')->with('msg', 'Email or Password is incorrect');
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
