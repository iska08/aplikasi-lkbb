<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;

class CheckRekapNilaiAkhir
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa status fitur
        $featureStatus = Setting::get('rekap_nilai_akhir_peserta');

        // Hanya admin atau peserta yang bisa mengakses jika fitur "on"
        if ($featureStatus === 'on' && !in_array(auth()->user()->level, ['1ADMIN', '4PESERTA'])) {
            return redirect()->back()->with('error', 'Akses ditolak. Anda tidak memiliki izin.');
        }

        // Jika fitur "off", semua akses ditolak kecuali admin
        if ($featureStatus === 'off' && auth()->user()->level !== '1ADMIN') {
            return redirect()->back()->with('error', 'Akses ditolak. Fitur ini sedang dinonaktifkan oleh admin.');
        }

        return $next($request);
    }
}