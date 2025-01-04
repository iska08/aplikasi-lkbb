<?php

namespace Database\Seeders\Sample;

use App\Models\Timeline;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $tgl_pendaftaran_buka  = $now;
        $tgl_pendaftaran_tutup = $tgl_pendaftaran_buka->copy()->addMonths(2);
        $tgl_tm                = $tgl_pendaftaran_tutup->copy()->subWeeks(1);
        $tgl_pelaksanaan       = $tgl_tm->copy()->addWeeks(2);

        Timeline::create([
            'tgl_pendaftaran_buka'  => $tgl_pendaftaran_buka->toDateString(),
            'tgl_pendaftaran_tutup' => $tgl_pendaftaran_tutup->toDateString(),
            'lokasi_pendaftaran'    => 'Lokasi Pendaftaran',
            'tgl_tm'                => $tgl_tm->toDateString(),
            'lokasi_tm'             => 'Lokasi Technical Meeting',
            'tgl_pelaksanaan'       => $tgl_pelaksanaan->toDateString(),
            'lokasi_pelaksanaan'    => 'Lokasi Pelaksanaan',
            'created_at'            => $now,
            'updated_at'            => $now,
        ]);
    }
}