<?php

namespace Database\Seeders\Sample;

use App\Models\Pleton;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PletonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $pletons = [];
        $posisiAnggota = [
            'Pelatih', 'Official', 'Danton', 
            'S1B1', 'S1B2', 'S1B3', 'S1B4', 'S1B5', 
            'S2B1', 'S2B2', 'S2B3', 'S2B4', 'S2B5', 
            'S3B1', 'S3B2', 'S3B3', 'S3B4', 'S3B5'
        ];
        // Looping setiap peserta_id (1 hingga 30 sesuai dengan PesertaSeeder)
        for ($pesertaId = 1; $pesertaId <= 30; $pesertaId++) {
            foreach ($posisiAnggota as $index => $namaAnggota) {
                $pletons[] = [
                    'peserta_id'    => $pesertaId,
                    'nama_anggota'  => $namaAnggota,
                    'kelas_anggota' => '-',
                    'nis_anggota'   => '-',
                    'posisi'        => $index + 1, // Posisi dimulai dari 1
                    'foto_anggota'  => '-',
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ];
            }
        }

        // Insert data ke database
        Pleton::insert($pletons);
    }
}