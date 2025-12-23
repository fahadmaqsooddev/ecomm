<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Log;
class EnsureCartIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $cartData = app(\App\Http\Controllers\CartController::class)->getUserCartData($user->id);

        if ($cartData['count'] === 0) {
            return redirect()->route('indexxxx')->with('error', 'Cart is empty.');
        }

        return $next($request);
    }
}
