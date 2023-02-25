<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check())
        {
            abort(404, 'Lỗi không thấy trang');
        }
//        else if(!Auth::check())
//        {
//            abort(403, 'Lỗi không thấy trang');
//        }
        return $next($request);
    }
}
