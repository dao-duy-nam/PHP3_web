<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // kiểm nếu không đăng nhập và ko phải là admin thì ko đc phép truy cập
      if(!Auth::check() ||!Auth::user()->isRoleAdmin()){
        return redirect()->route('login')->withErrors('Bạn không đủ quyền truy cập vào trang admin');
      }
        
        return $next($request);
    }
}
