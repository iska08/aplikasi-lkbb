<?php

namespace Database\Seeders\Sample;

use App\Models\Cp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now(); // Waktu sekarang
        //Seeder untuk CP
        $cps = [
            ['nama_cp' => 'ABC', 'noHp' => '088803820248', 'peran' => 'AKUN', 'created_at' => $now, 'updated_at' => $now],
            ['nama_cp' => 'DEF', 'noHp' => '088803820248', 'peran' => 'PENDAFTARAN', 'created_at' => $now, 'updated_at' => $now],
            ['nama_cp' => 'GHI', 'noHp' => '088803820248', 'peran' => 'JUKNIS', 'created_at' => $now, 'updated_at' => $now],
            ['nama_cp' => 'JKL', 'noHp' => '088803820248', 'peran' => 'BAZAR', 'created_at' => $now, 'updated_at' => $now],
            ['nama_cp' => 'MNO', 'noHp' => '088803820248', 'peran' => 'PENGINAPAN', 'created_at' => $now, 'updated_at' => $now]
        ];
        Cp::insert($cps);
    }
}