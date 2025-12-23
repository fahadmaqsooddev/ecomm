<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Log;
class UserLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('web')->check()) {
            return $next($request);
        } else {

              // Flash a message to the session for the next request
              session()->flash('message', 'You need to log in to perform this action.');

               // Store the current and previous URLs in the session
                $currentUrl = url()->full();
                $previousUrl = session('previous_url', null);
                
                // Store the second previous URL and current URL
                session(['previous_url' => $currentUrl]);
                session(['second_previous_url' => $previousUrl]);
  
              // If the request is an AJAX request, return a 401 response with a redirect URL
              if ($request->ajax() || $request->wantsJson()) {
                  return response()->json([
                      'message' => 'You need to log in to perform this action.',
                      'redirect_url' => route('userlogin')  // The login page URL
                  ], 401);
              }
  
              // Otherwise, redirect to the login page for normal requests
              return redirect()->route('userlogin');
        }

    }
}
