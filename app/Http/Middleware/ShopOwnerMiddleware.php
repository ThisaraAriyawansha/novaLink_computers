<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ShopOwnerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'shop_owner') {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login')->with('error', 'Access denied.');
    }
}
