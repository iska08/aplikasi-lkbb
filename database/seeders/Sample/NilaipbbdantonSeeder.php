<?php

namespace Database\Seeders\Sample;

use App\Models\Nilaipbbdanton;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class NilaipbbdantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        // SD/MI Sederajat
        $abaabaPointSDs = [
            // PBB TAMBAHAN
             1 => [28, 30, 32, 34, 36, 38, 40],
            // PBB DI TEMPAT
             2 => [ 4,  6,  8, 10, 12, 14, 16],
             3 => [10, 12, 14, 16, 18, 20, 22],
             4 => [10, 12, 14, 16, 18, 20, 22],
             5 => [ 8, 10, 12, 14, 16, 18, 20],
             6 => [ 6,  8, 10, 12, 14, 16, 18],
             7 => [11, 13, 15, 17, 19, 21, 22],
             8 => [ 8, 10, 12, 14, 16, 18, 20],
             9 => [17, 19, 21, 23, 25, 27, 29],
            10 => [10, 12, 14, 16, 18, 20, 22],
            11 => [10, 12, 14, 16, 18, 20, 22],
            12 => [10, 12, 14, 16, 18, 20, 22],
            13 => [ 8, 10, 12, 14, 16, 18, 20],
            14 => [11, 13, 15, 17, 19, 21, 24],
            // PBB BERJALAN KE BERJALAN
            15 => [17, 19, 21, 23, 25, 27, 29],
            16 => [19, 21, 23, 25, 27, 29, 31],
            17 => [23, 25, 27, 29, 31, 33, 35],
            18 => [21, 23, 25, 27, 29, 31, 33],
            19 => [21, 23, 25, 27, 29, 31, 33],
            20 => [19, 21, 23, 25, 27, 29, 31],
            21 => [23, 25, 27, 29, 31, 33, 35],
            22 => [23, 25, 27, 29, 31, 33, 35],
            23 => [21, 23, 25, 27, 29, 31, 33],
            24 => [23, 25, 27, 29, 31, 33, 35],
            25 => [21, 23, 25, 27, 29, 31, 33],
            26 => [23, 25, 27, 29, 31, 33, 35],
            27 => [19, 21, 23, 25, 27, 29, 31],
            // PBB TAMBAHAN
            28 => [22, 24, 26, 28, 30, 32, 34],
            // DANTON
            29 => [ 9, 11, 13, 15, 17, 19, 21],
            30 => [ 5,  7,  9, 11, 13, 15, 17],
            31 => [ 6,  8, 10, 12, 14, 16, 18],
            32 => [10, 12, 14, 16, 18, 20, 22],
            33 => [10, 12, 14, 16, 18, 20, 22],
        ];
        $dataSD = [];
        $userIdSDs = [2, 3]; // Juri 1 dan Juri 2
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
        Nilaipbbdanton::insert($dataSD);

        // SMP/MTs Sederajat
        $abaabaPointSMPs = [
            // PBB TAMBAHAN
            47 => [28, 30, 32, 34, 36, 38, 40],
            // PBB BERJALAN KE BERJALAN
            48 => [ 4,  6,  8, 10, 12, 14, 16],
            49 => [17, 19, 21, 23, 25, 27, 29],
            50 => [19, 21, 23, 25, 27, 29, 31],
            51 => [23, 25, 27, 29, 31, 33, 35],
            52 => [21, 23, 25, 27, 29, 31, 33],
            53 => [21, 23, 25, 27, 29, 31, 33],
            54 => [19, 21, 23, 25, 27, 29, 31],
            55 => [23, 25, 27, 29, 31, 33, 35],
            56 => [23, 25, 27, 29, 31, 33, 35],
            57 => [21, 23, 25, 27, 29, 31, 33],
            58 => [23, 25, 27, 29, 31, 33, 35],
            59 => [21, 23, 25, 27, 29, 31, 33],
            60 => [23, 25, 27, 29, 31, 33, 35],
            61 => [19, 21, 23, 25, 27, 29, 31],
            // PBB DI TEMPAT
            62 => [10, 12, 14, 16, 18, 20, 22],
            63 => [10, 12, 14, 16, 18, 20, 22],
            64 => [ 8, 10, 12, 14, 16, 18, 20],
            65 => [ 6,  8, 10, 12, 14, 16, 18],
            66 => [11, 13, 15, 17, 19, 21, 22],
            67 => [ 8, 10, 12, 14, 16, 18, 20],
            68 => [17, 19, 21, 23, 25, 27, 29],
            69 => [10, 12, 14, 16, 18, 20, 22],
            70 => [10, 12, 14, 16, 18, 20, 22],
            71 => [10, 12, 14, 16, 18, 20, 22],
            72 => [ 8, 10, 12, 14, 16, 18, 20],
            73 => [11, 13, 15, 17, 19, 21, 24],
            // PBB BERPINDAH TEMPAT
            74 => [18, 20, 22, 24, 26, 28, 30],
            75 => [17, 19, 21, 23, 25, 27, 29],
            76 => [18, 20, 22, 24, 26, 28, 30],
            77 => [17, 19, 21, 23, 25, 27, 29],
            // PBB TAMBAHAN
            78 => [22, 24, 26, 28, 30, 32, 34],
            // DANTON
            79 => [ 9, 11, 13, 15, 17, 19, 21],
            80 => [ 5,  7,  9, 11, 13, 15, 17],
            81 => [ 6,  8, 10, 12, 14, 16, 18],
            82 => [10, 12, 14, 16, 18, 20, 22],
            83 => [10, 12, 14, 16, 18, 20, 22],
        ];
        $dataSMP = [];
        $userIdSMPs = [2, 3]; // Juri 1 dan Juri 2
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
        Nilaipbbdanton::insert($dataSMP);

        // SMA/SMK/MA Sederajat
        $abaabaPointSMAs = [
            // PBB TAMBAHAN
             97 => [28, 30, 32, 34, 36, 38, 40],
            // PBB BERJALAN KE BERJALAN
             98 => [ 4,  6,  8, 10, 12, 14, 16],
             99 => [17, 19, 21, 23, 25, 27, 29],
            100 => [19, 21, 23, 25, 27, 29, 31],
            101 => [23, 25, 27, 29, 31, 33, 35],
            102 => [21, 23, 25, 27, 29, 31, 33],
            103 => [21, 23, 25, 27, 29, 31, 33],
            104 => [19, 21, 23, 25, 27, 29, 31],
            105 => [23, 25, 27, 29, 31, 33, 35],
            106 => [23, 25, 27, 29, 31, 33, 35],
            107 => [21, 23, 25, 27, 29, 31, 33],
            108 => [23, 25, 27, 29, 31, 33, 35],
            109 => [21, 23, 25, 27, 29, 31, 33],
            110 => [23, 25, 27, 29, 31, 33, 35],
            111 => [19, 21, 23, 25, 27, 29, 31],
            // PBB DI TEMPAT
            112 => [10, 12, 14, 16, 18, 20, 22],
            113 => [10, 12, 14, 16, 18, 20, 22],
            114 => [ 8, 10, 12, 14, 16, 18, 20],
            115 => [ 6,  8, 10, 12, 14, 16, 18],
            116 => [11, 13, 15, 17, 19, 21, 22],
            117 => [ 8, 10, 12, 14, 16, 18, 20],
            118 => [17, 19, 21, 23, 25, 27, 29],
            119 => [10, 12, 14, 16, 18, 20, 22],
            120 => [10, 12, 14, 16, 18, 20, 22],
            121 => [10, 12, 14, 16, 18, 20, 22],
            122 => [ 8, 10, 12, 14, 16, 18, 20],
            123 => [11, 13, 15, 17, 19, 21, 24],
            // PBB BERPINDAH TEMPAT
            124 => [18, 20, 22, 24, 26, 28, 30],
            125 => [17, 19, 21, 23, 25, 27, 29],
            126 => [18, 20, 22, 24, 26, 28, 30],
            127 => [17, 19, 21, 23, 25, 27, 29],
            // PBB TAMBAHAN
            128 => [22, 24, 26, 28, 30, 32, 34],
            // DANTON
            129 => [ 9, 11, 13, 15, 17, 19, 21],
            130 => [ 5,  7,  9, 11, 13, 15, 17],
            131 => [ 6,  8, 10, 12, 14, 16, 18],
            132 => [10, 12, 14, 16, 18, 20, 22],
            133 => [10, 12, 14, 16, 18, 20, 22],
        ];
        $dataSMA = [];
        $userIdSMAs = [2, 3]; // Juri 1 dan Juri 2
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
        Nilaipbbdanton::insert($dataSMA);
    }
}