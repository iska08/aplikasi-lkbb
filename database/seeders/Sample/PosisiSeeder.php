<?php

namespace Database\Seeders\Sample;

use App\Models\Posisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PosisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now(); // Waktu sekarang
        // Seeder untuk Posisi
        $posisis = [
            'Pelatih', 'Official', 'Danton', 'S1B1', 'S1B2', 'S1B3', 'S1B4', 'S1B5',
            'S2B1', 'S2B2', 'S2B3', 'S2B4', 'S2B5', 'S3B1', 'S3B2', 'S3B3', 'S3B4', 'S3B5',
        ];
        Posisi::insert(array_map(fn ($pos) => [
            'nama_posisi' => $pos,
            'keterangan' => '-',
            'created_at' => $now,
            'updated_at' => $now,
        ], $posisis));
    }
}