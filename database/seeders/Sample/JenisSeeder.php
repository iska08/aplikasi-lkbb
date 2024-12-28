<?php

namespace Database\Seeders\Sample;

use App\Models\Jenis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now(); // Waktu sekarang
        // Seeder untuk Jenis Aba-Aba
        $jenises = [
            // SD/MI Sederajat
            ['tingkatan_id' => '1', 'jenis_name' => 'PBB TAMBAHAN', 'urutan' => '1', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '1', 'jenis_name' => 'PBB DI TEMPAT', 'urutan' => '2', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '1', 'jenis_name' => 'PBB BERJALAN KE BERJALAN', 'urutan' => '3', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '1', 'jenis_name' => 'PBB TAMBAHAN', 'urutan' => '4', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '1', 'jenis_name' => 'DANTON', 'urutan' => '5', 'tipe' => '2DANTON', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '1', 'jenis_name' => 'VARIASI', 'urutan' => '6', 'tipe' => '3VARIASI', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '1', 'jenis_name' => 'FORMASI', 'urutan' => '7', 'tipe' => '4FORMASI', 'created_at' => $now, 'updated_at' => $now,],
            // SMP/MTs Sederajat
            ['tingkatan_id' => '2', 'jenis_name' => 'PBB TAMBAHAN', 'urutan' => '1', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '2', 'jenis_name' => 'PBB BERJALAN KE BERJALAN', 'urutan' => '2', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '2', 'jenis_name' => 'PBB DI TEMPAT', 'urutan' => '3', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '2', 'jenis_name' => 'BERPINDAH TEMPAT', 'urutan' => '4', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '2', 'jenis_name' => 'PBB TAMBAHAN', 'urutan' => '5', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '2', 'jenis_name' => 'DANTON', 'urutan' => '6', 'tipe' => '2DANTON', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '2', 'jenis_name' => 'VARIASI', 'urutan' => '7', 'tipe' => '3VARIASI', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '2', 'jenis_name' => 'FORMASI', 'urutan' => '8', 'tipe' => '4FORMASI', 'created_at' => $now, 'updated_at' => $now,],
            // SMA/SMK/MA Sederajat
            ['tingkatan_id' => '3', 'jenis_name' => 'PBB TAMBAHAN', 'urutan' => '1', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '3', 'jenis_name' => 'PBB BERJALAN KE BERJALAN', 'urutan' => '2', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '3', 'jenis_name' => 'PBB DI TEMPAT', 'urutan' => '3', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '3', 'jenis_name' => 'BERPINDAH TEMPAT', 'urutan' => '4', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '3', 'jenis_name' => 'PBB TAMBAHAN', 'urutan' => '5', 'tipe' => '1PBB', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '3', 'jenis_name' => 'DANTON', 'urutan' => '6', 'tipe' => '2DANTON', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '3', 'jenis_name' => 'VARIASI', 'urutan' => '7', 'tipe' => '3VARIASI', 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => '3', 'jenis_name' => 'FORMASI', 'urutan' => '8', 'tipe' => '4FORMASI', 'created_at' => $now, 'updated_at' => $now,],
        ];
        Jenis::insert($jenises);
    }
}