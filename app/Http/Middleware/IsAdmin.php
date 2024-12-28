<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->level == '1ADMIN' || Auth::user()->level == '2JURIPBB' || Auth::user()->level == '3JURIVARFOR' || Auth::user()->level == '4PESERTA' || Auth::user()->level == '5CALONPESERTA') {
            return $next($request);
        }

        return redirect('/dashboard')->with('failed', 'Anda Tidak Memiliki Akses');
    }
}
