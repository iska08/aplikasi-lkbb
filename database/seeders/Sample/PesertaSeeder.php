<?php

namespace Database\Seeders\Sample;

use App\Models\Peserta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $pesertas = [];
        // SD/MI Sederajat: user_id 6-25, tingkatan_id = 1, status = AKTIF
        for ($i = 6; $i <= 25; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 1,
                'no_urut'      => $i - 5,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'status'       => 'AKTIF',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        // SD/MI Sederajat: user_id 26-27, tingkatan_id = 1, status = BATAL
        for ($i = 26; $i <= 27; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 1,
                'no_urut'      => $i - 5,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'status'       => 'BATAL',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        // SMP/MTs Sederajat: user_id 28-57, tingkatan_id = 2, status = AKTIF
        for ($i = 28; $i <= 57; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 2,
                'no_urut'      => $i - 27,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'status'       => 'AKTIF',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        // SMP/MTs Sederajat: user_id 58-59, tingkatan_id = 2, status = BATAL
        for ($i = 58; $i <= 59; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 2,
                'no_urut'      => $i - 27,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'status'       => 'BATAL',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        // SMA/SMK/MA Sederajat: user_id 60-99, tingkatan_id = 3, status = AKTIF
        for ($i = 60; $i <= 99; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 3,
                'no_urut'      => $i - 59,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'status'       => 'AKTIF',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        // SMA/SMK/MA Sederajat: user_id 100-101, tingkatan_id = 3, status = BATAL
        for ($i = 100; $i <= 101; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 3,
                'no_urut'      => $i - 59,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'status'       => 'BATAL',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        // Insert ke database
        Peserta::insert($pesertas);
    }
}