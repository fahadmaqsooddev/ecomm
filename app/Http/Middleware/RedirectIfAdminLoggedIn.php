<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RedirectIfAdminLoggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if admin is logged in
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();

            // Log admin data to Laravel log file
            Log::info('Admin is already logged in', [
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email
            ]);

            // Redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // If not logged in, continue
        return $next($request);
    }
}
