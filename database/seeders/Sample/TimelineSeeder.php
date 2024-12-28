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
        Timeline::create([
            'tgl_pendaftaran_buka'  => '2024-12-02',
            'tgl_pendaftaran_tutup' => '2024-12-15',
            'lokasi_pendaftaran'    => 'Lokasi Pendaftaran',
            'tgl_tm'                => '2024-12-15',
            'lokasi_tm'             => 'Lokasi Technical Meeting',
            'tgl_pelaksanaan'       => '2024-12-22',
            'lokasi_pelaksanaan'    => 'Lokasi Pelaksanaan',
        ]);
    }
}