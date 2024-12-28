<?php

namespace Database\Seeders\Sample;

use App\Models\Tingkatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class TingkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $tingkatans = [
            [
                'nama_tingkatan' => 'SD/MI Sederajat',
                'slug'           => Str::slug('SD/MI Sederajat'),
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'nama_tingkatan' => 'SMP/MTs Sederajat',
                'slug'           => Str::slug('SMP/MTs Sederajat'),
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
            [
                'nama_tingkatan' => 'SMA/SMK/MA Sederajat',
                'slug'           => Str::slug('SMA/SMK/MA Sederajat'),
                'created_at'     => $now,
                'updated_at'     => $now,
            ],
        ];
        Tingkatan::insert($tingkatans);
    }
}