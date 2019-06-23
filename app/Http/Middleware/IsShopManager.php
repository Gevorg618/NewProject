<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class IsShopManager
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
//        dd(Activity::all());
        $user = Auth::user();
        if ($user->isAn('shop-manager') || $user->isAn('admin')){
            return $next($request);
        }

        return redirect('home');
    }
}
