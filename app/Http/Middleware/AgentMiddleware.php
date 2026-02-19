<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class AgentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->role === 'admin') {
                return $next($request);
            } elseif (Auth::user()->role === 'shop_owner') {
                // Shop owners have their own dashboard
                return redirect()->route('shop.dashboard');
            } else {
                Auth::logout();
                return redirect(url(''));
            }
        } else {
            Auth::logout();
            return redirect(url(''));
        }
    }
}
