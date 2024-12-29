<?php

namespace Database\Seeders\Sample;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
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
        $users = [
            ['name' => 'Juri PBB 1', 'username' => 'juripbb1', 'email' => 'juripbb1@gmail.com', 'password' => bcrypt('juripbb1'), 'level' => '2JURIPBB', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Juri PBB 2', 'username' => 'juripbb2', 'email' => 'juripbb2@gmail.com', 'password' => bcrypt('juripbb2'), 'level' => '2JURIPBB', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Juri Varfor 1', 'username' => 'jurivarfor1', 'email' => 'jurivarfor1@gmail.com', 'password' => bcrypt('jurivarfor1'), 'level' => '3JURIVARFOR', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Juri Varfor 2', 'username' => 'jurivarfor2', 'email' => 'jurivarfor2@gmail.com', 'password' => bcrypt('jurivarfor2'), 'level' => '3JURIVARFOR', 'created_at' => $now, 'updated_at' => $now],
        ];
        // Generate data SD-MI (12 Users)
        for ($i = 1; $i <= 20; $i++) {
            $users[] = [
                'name'       => "SD-MI $i",
                'username'   => "sdmi$i",
                'email'      => "sdmi$i@gmail.com",
                'password'   => bcrypt("sdmi$i"),
                'level'      => '4PESERTA',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        // Generate data SMP-MTs (12 Users)
        for ($i = 1; $i <= 30; $i++) {
            $users[] = [
                'name'       => "SMP-MTs $i",
                'username'   => "smpmts$i",
                'email'      => "smpmts$i@gmail.com",
                'password'   => bcrypt("smpmts$i"),
                'level'      => '4PESERTA',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        // Generate data SMA-SMK-MA (12 Users)
        for ($i = 1; $i <= 40; $i++) {
            $users[] = [
                'name'       => "SMA-SMK-MA $i",
                'username'   => "smasmkma$i",
                'email'      => "smasmkma$i@gmail.com",
                'password'   => bcrypt("smasmkma$i"),
                'level'      => '4PESERTA',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        for ($i = 1; $i <= 5; $i++) {
            $users[] = [
                'name'       => "CALON PESERTA $i",
                'username'   => "calonpeserta$i",
                'email'      => "calonpeserta$i@gmail.com",
                'password'   => bcrypt("calonpeserta$i"),
                'level'      => '5CALONPESERTA',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        // Insert semua data ke database
        User::insert($users);
    }
}