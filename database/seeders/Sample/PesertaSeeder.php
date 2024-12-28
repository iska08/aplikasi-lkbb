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
        // SD/MI Sederajat: user_id 6-15, tingkatan_id = 1
        for ($i = 6; $i <= 15; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 1,
                'no_urut'      => $i - 5,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        // SMP/MTs Sederajat: user_id 18-27, tingkatan_id = 2
        for ($i = 18; $i <= 27; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 2,
                'no_urut'      => $i - 17,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        // SMA/SMK/MA Sederajat: user_id 30-39, tingkatan_id = 3
        for ($i = 30; $i <= 39; $i++) {
            $pesertas[] = [
                'user_id'      => $i,
                'tingkatan_id' => 3,
                'no_urut'      => $i - 29,
                'foto_pleton'  => '-',
                'rekomendasi'  => '-',
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        // Insert ke database
        Peserta::insert($pesertas);
    }
}