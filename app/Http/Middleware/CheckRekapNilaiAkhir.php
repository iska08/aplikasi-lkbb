<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;

class CheckRekapNilaiAkhir
{
    public function handle(Request $request, Closure $next)
    {
        if (Setting::get('rekap_nilai_akhir_peserta') === 'off' && auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Akses ditolak. Fitur ini sedang dinonaktifkan oleh admin.');
        }

        return $next($request);
    }
}