<?php

namespace Database\Seeders\Sample;

use App\Models\Berkas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        Berkas::create([
            'poster' => 'http://drive.google.com/drive/my-drive',
            'rekom'  => 'http://drive.google.com/drive/my-drive',
            'juknis' => 'http://drive.google.com/drive/my-drive',
        ]);
    }
}