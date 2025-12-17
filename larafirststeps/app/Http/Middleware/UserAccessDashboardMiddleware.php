<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class UserAccessDashboardMiddleware
{
    // public function handle(Request $request, Closure $next): Response
    // {

    //     if (auth()->user()->isAdmin()){
    //         return $next($request);
    //     }
    //     return redirect('/');
 
       
    // }



    public function handle(Request $request, Closure $next): Response
{
    if ($request->user() && $request->user()->isAdmin()) {
        return $next($request);
    }

    return redirect('/');
}
}
