<?php

namespace Database\Seeders\Sample;

use App\Models\Bayar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BayarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now(); // Waktu sekarang
        $bayars = [];
        // Looping untuk SD/MI, SMP/MTs, SMA/SMK/MA
        for ($i = 6; $i <= 100; $i++) {
            $bayars[] = [
                'user_id'     => $i,
                'screenshot'  => '-',
                'created_at'  => $now,
                'updated_at'  => $now,
            ];
        }
        // Insert ke database
        Bayar::insert($bayars);
    }
}