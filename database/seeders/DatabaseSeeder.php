<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            \Database\Seeders\Sample\DefaultSeeder::class,
            \Database\Seeders\Sample\UserSeeder::class,
            \Database\Seeders\Sample\DetailSeeder::class,
            \Database\Seeders\Sample\TimelineSeeder::class,
            \Database\Seeders\Sample\SosmedSeeder::class,
            \Database\Seeders\Sample\BerkasSeeder::class,
            \Database\Seeders\Sample\CpSeeder::class,
            \Database\Seeders\Sample\TingkatanSeeder::class,
            \Database\Seeders\Sample\BenefitSeeder::class,
            \Database\Seeders\Sample\PosisiSeeder::class,
            \Database\Seeders\Sample\JenisSeeder::class,
            \Database\Seeders\Sample\AbaabaSeeder::class,
            \Database\Seeders\Sample\PenilaianSeeder::class,
            \Database\Seeders\Sample\PesertaSeeder::class,
            \Database\Seeders\Sample\BayarSeeder::class,
            \Database\Seeders\Sample\PletonSeeder::class,
            \Database\Seeders\Sample\PenguranganSeeder::class,
            \Database\Seeders\Sample\NilaipbbdantonSeeder::class,
            \Database\Seeders\Sample\NilaivarforSeeder::class,
        ]);
    }
}