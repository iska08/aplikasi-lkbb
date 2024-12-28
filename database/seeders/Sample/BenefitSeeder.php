<?php

namespace Database\Seeders\Sample;

use App\Models\Benefit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        // Generate data SD-MI
        $benefits = [
            [
                'tingkatan_id' => 1,
                'nama_juara'   => 'JUARA UMUM',
                'trophy'       => 'TROPHY BERGILIR',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ]
        ];
        /// UTAMA
        $basePrize = 1000000;
        $deduction = 250000;
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "JUARA $i UTAMA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => $basePrize - ($deduction * ($i - 1)),
                'prioritas'    => $i + 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "JUARA $i HARAPAN",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 4,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "JUARA $i MADYA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 7,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BINA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "JUARA $i BINA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 10,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MULA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "JUARA $i MULA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 13,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// UTAMA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "JUARA $i UTAMA VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 16,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "JUARA $i HARAPAN VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 19,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "JUARA $i MADYA VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 22,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST PBB
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "BEST PBB $i",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 25,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST DANTON
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "BEST DANTON $i",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 28,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        Benefit::insert($benefits);
        $benefits = [
            ['tingkatan_id' => 1, 'nama_juara' => 'BEST POPULER PASUKAN', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 32, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 1, 'nama_juara' => 'BEST FAVORIT BALLOT 1', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 33, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 1, 'nama_juara' => 'BEST FAVORIT BALLOT 2', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 34, 'created_at' => $now, 'updated_at' => $now,],
        ];
        Benefit::insert($benefits);

        // Generate SMP-MTs
        $benefits = [
            [
                'tingkatan_id' => 2,
                'nama_juara'   => 'JUARA UMUM',
                'trophy'       => 'TROPHY BERGILIR',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ]
        ];
        /// UTAMA
        $basePrize = 1250000;
        $deduction = 250000;
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i UTAMA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => $basePrize - ($deduction * ($i - 1)),
                'prioritas'    => $i + 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i HARAPAN",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 4,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i MADYA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 7,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BINA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i BINA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 10,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MULA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i MULA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 13,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// PURWA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i PURWA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 16,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// CARAKA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i CARAKA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 19,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// UTAMA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i UTAMA VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 22,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i HARAPAN VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 25,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "JUARA $i MADYA VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 28,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST PBB
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "BEST PBB $i",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 31,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST DANTON
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "BEST DANTON $i",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 34,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        Benefit::insert($benefits);
        $benefits = [
            ['tingkatan_id' => 2, 'nama_juara' => 'BEST POPULER PASUKAN', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 38, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 2, 'nama_juara' => 'BEST FAVORIT BALLOT 1', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 39, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 2, 'nama_juara' => 'BEST FAVORIT BALLOT 2', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 40, 'created_at' => $now, 'updated_at' => $now,],
        ];
        Benefit::insert($benefits);

        // Generate SMA/SMK/MA
        $benefits = [
            [
                'tingkatan_id' => 3,
                'nama_juara'   => 'JUARA UMUM',
                'trophy'       => 'TROPHY BERGILIR',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ]
        ];
        /// UTAMA
        $basePrize = 1500000;
        $deduction = 250000;
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i UTAMA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => $basePrize - ($deduction * ($i - 1)),
                'prioritas'    => $i + 1,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i HARAPAN",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 4,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i MADYA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 7,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BINA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i BINA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 10,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MULA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i MULA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 13,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// PURWA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i PURWA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 16,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// CARAKA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i CARAKA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 19,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// PERINTIS
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i PERINTIS",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 22,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// POTENSIAL
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i POTENSIAL",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 25,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// SIAGA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i SIAGA",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 28,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// UTAMA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i UTAMA VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 31,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i HARAPAN VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 34,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "JUARA $i MADYA VARFOR",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 37,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST PBB
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "BEST PBB $i",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 40,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST DANTON
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "BEST DANTON $i",
                'trophy'       => 'TROPHY TETAP',
                'hadiah'       => 'SERTIFIKAT',
                'uang'         => 0,
                'prioritas'    => $i + 43,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        Benefit::insert($benefits);
        $benefits = [
            ['tingkatan_id' => 3, 'nama_juara' => 'BEST POPULER PASUKAN', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 47, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 3, 'nama_juara' => 'BEST FAVORIT BALLOT 1', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 48, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 3, 'nama_juara' => 'BEST FAVORIT BALLOT 2', 'trophy' => 'TROPHY TETAP', 'hadiah' => 'TIDAK ADA', 'uang' => 0, 'prioritas' => 49, 'created_at' => $now, 'updated_at' => $now,],
        ];
        Benefit::insert($benefits);
    }
}