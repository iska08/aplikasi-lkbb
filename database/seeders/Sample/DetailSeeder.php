<?php

namespace Database\Seeders\Sample;

use App\Models\Detail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $faker = Faker::create();
        $latitude = $faker->latitude(-7, -8);
        $longitude = $faker->longitude(112, 113);

        Detail::create([
            'cakupan'         => 'Se-Jawa Timur',
            'alamat'          => $faker->address,
            'maps'            => "https://www.google.com/maps?q={$latitude},{$longitude}",
            'keterangan_lkbb' => $faker->sentence,
            'total_pembinaan' => '15000000',
            'htm'             => '25000',
            'created_at'      => $now,
            'updated_at'      => $now,
        ]);
    }
}