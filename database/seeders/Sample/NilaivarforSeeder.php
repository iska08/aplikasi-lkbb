<?php

namespace Database\Seeders\Sample;

use App\Models\Nilaivarfor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class NilaivarforSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now(); // Waktu sekarang

        // SD/MI Sederajat
        $abaabaPointSDs = [
            // VARIASI
            34 => [2, 4, 6, 8, 10, 12, 14],
            35 => [6, 8, 10, 12, 14, 16, 18],
            36 => [8, 10, 12, 14, 16, 18, 20],
            37 => [2, 4, 6, 8, 10, 12, 14],
            38 => [4, 6, 8, 10, 12, 14, 16],
            39 => [6, 8, 10, 12, 14, 16, 18],
            // FORMASI
            40 => [3, 5, 7, 9, 11, 13, 15],
            41 => [4, 6, 8, 10, 12, 14, 16],
            42 => [7, 9, 11, 13, 15, 17, 19],
            43 => [6, 8, 10, 12, 14, 16, 18],
            44 => [9, 11, 13, 15, 17, 19, 21],
            45 => [3, 5, 7, 9, 11, 13, 15],
            46 => [4, 6, 8, 10, 12, 14, 16],
        ];
        $dataSD = [];
        $userIdSDs = [4, 5]; // Juri 1 dan Juri 2
        // Loop untuk peserta_id dari 1 hingga 10
        for ($pesertaIdSD = 1; $pesertaIdSD <= 10; $pesertaIdSD++) {
            foreach ($userIdSDs as $userIdSD) {
                foreach ($abaabaPointSDs as $abaabaIdSD => $pointSDs) {
                    $dataSD[] = [
                        'peserta_id'  => $pesertaIdSD,
                        'user_id'     => $userIdSD,
                        'abaaba_id'   => $abaabaIdSD,
                        'points'      => $pointSDs[array_rand($pointSDs)], // Ambil nilai random dari array
                        'created_at'  => $now,
                        'updated_at'  => $now,
                    ];
                }
            }
        }
        // Insert data ke dalam database
        Nilaivarfor::insert($dataSD);

        // SMP/MTs Sederajat
        $abaabaPointSMPs = [
            // VARIASI
            84 => [2, 4, 6, 8, 10, 12, 14],
            85 => [6, 8, 10, 12, 14, 16, 18],
            86 => [8, 10, 12, 14, 16, 18, 20],
            87 => [2, 4, 6, 8, 10, 12, 14],
            88 => [4, 6, 8, 10, 12, 14, 16],
            89 => [6, 8, 10, 12, 14, 16, 18],
            // FORMASI
            90 => [3, 5, 7, 9, 11, 13, 15],
            91 => [4, 6, 8, 10, 12, 14, 16],
            92 => [7, 9, 11, 13, 15, 17, 19],
            93 => [6, 8, 10, 12, 14, 16, 18],
            94 => [9, 11, 13, 15, 17, 19, 21],
            95 => [3, 5, 7, 9, 11, 13, 15],
            96 => [4, 6, 8, 10, 12, 14, 16],
        ];
        $dataSMP = [];
        $userIdSMPs = [4, 5]; // Juri 1 dan Juri 2
        // Loop untuk peserta_id dari 11 hingga 20
        for ($pesertaIdSMP = 11; $pesertaIdSMP <= 20; $pesertaIdSMP++) {
            foreach ($userIdSMPs as $userIdSMP) {
                foreach ($abaabaPointSMPs as $abaabaIdSMP => $pointSMPs) {
                    $dataSMP[] = [
                        'peserta_id'  => $pesertaIdSMP,
                        'user_id'     => $userIdSMP,
                        'abaaba_id'   => $abaabaIdSMP,
                        'points'      => $pointSMPs[array_rand($pointSMPs)], // Ambil nilai random dari array
                        'created_at'  => $now,
                        'updated_at'  => $now,
                    ];
                }
            }
        }
        // Insert data ke dalam database
        Nilaivarfor::insert($dataSMP);

        // SMA/SMK/MA Sederajat
        $abaabaPointSMAs = [
            // VARIASI
            134 => [2, 4, 6, 8, 10, 12, 14],
            135 => [6, 8, 10, 12, 14, 16, 18],
            136 => [8, 10, 12, 14, 16, 18, 20],
            137 => [2, 4, 6, 8, 10, 12, 14],
            138 => [4, 6, 8, 10, 12, 14, 16],
            139 => [6, 8, 10, 12, 14, 16, 18],
            // FORMASI
            140 => [3, 5, 7, 9, 11, 13, 15],
            141 => [4, 6, 8, 10, 12, 14, 16],
            142 => [7, 9, 11, 13, 15, 17, 19],
            143 => [6, 8, 10, 12, 14, 16, 18],
            144 => [9, 11, 13, 15, 17, 19, 21],
            145 => [3, 5, 7, 9, 11, 13, 15],
            146 => [4, 6, 8, 10, 12, 14, 16],
        ];
        $dataSMA = [];
        $userIdSMAs = [4, 5]; // Juri 1 dan Juri 2
        // Loop untuk peserta_id dari 21 hingga 30
        for ($pesertaIdSMA = 21; $pesertaIdSMA <= 30; $pesertaIdSMA++) {
            foreach ($userIdSMAs as $userIdSMA) {
                foreach ($abaabaPointSMAs as $abaabaIdSMA => $pointSMAs) {
                    $dataSMA[] = [
                        'peserta_id'  => $pesertaIdSMA,
                        'user_id'     => $userIdSMA,
                        'abaaba_id'   => $abaabaIdSMA,
                        'points'      => $pointSMAs[array_rand($pointSMAs)], // Ambil nilai random dari array
                        'created_at'  => $now,
                        'updated_at'  => $now,
                    ];
                }
            }
        }
        // Insert data ke dalam database
        Nilaivarfor::insert($dataSMA);
    }
}