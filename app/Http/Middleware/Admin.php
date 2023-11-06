<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->intended('login')->with('erorr', __('messages.У вас не доступа к данной странице!'));
        }

        if ($user->role != User::ADMIN) {
            return redirect()->back()->with('erorr', __('messages.У вас не доступа к данной странице!'));
        }

        return $next($request);
    }
}
