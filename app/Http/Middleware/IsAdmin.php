<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;



class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        $user = Auth::user();

        if ($user->isAn('user-manager') || $user->isAn('admin')){
            return $next($request);
        }

        return redirect('home');
    }
}
