<?php

namespace Database\Seeders\Sample;

use App\Models\Informasi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        // Seeder untuk Users
        User::create([
            'name'       => 'Administrator',
            'username'   => 'admin1',
            'email'      => 'admin1@gmail.com',
            'password'   => bcrypt('admin123'),
            'level'      => '1ADMIN',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}