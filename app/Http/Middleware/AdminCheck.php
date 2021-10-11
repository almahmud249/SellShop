<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->path());
        $isAuth = Auth::guard('admin')->user();
        if ($request->path() !="/admin/login" && !$isAuth) {
            return redirect()->route('admin.login');
        }else{

            return $next($request);

        }


    }
}
