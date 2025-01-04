<?php

namespace Database\Seeders\Sample;

use App\Models\Sosmed;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        Sosmed::create([
            'email'      => 'admin1@gmail.com',
            'facebook'   => 'https://www.facebook.com/',
            'instagram'  => 'https://www.instagram.com/',
            'tiktok'     => 'http://tiktok.com/id-id/',
            'twitter'    => 'http://twitter.com/',
            'youtube'    => 'https://www.youtube.com/',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}