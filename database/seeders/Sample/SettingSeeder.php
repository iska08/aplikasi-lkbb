<?php

namespace Database\Seeders\Sample;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        Setting::create([
            'key'        => 'rekap_nilai_akhir_peserta',
            'value'      => 'on',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}