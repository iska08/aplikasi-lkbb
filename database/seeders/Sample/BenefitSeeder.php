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
                'nama_juara'   => 'Juara Umum',
                'trophy'       => 'Trophy Bergilir',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '1UMUM',
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
                'nama_juara'   => "Juara $i Utama",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => $basePrize - ($deduction * ($i - 1)),
                'tipe'         => '2UTAMA',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Juara $i Harapan",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 3,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Juara $i Madya",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 6,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BINA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Juara $i Bina",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 9,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MULA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Juara $i Mula",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 12,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// UTAMA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Juara $i Utama Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Juara $i Harapan Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i + 3,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Juara $i Madya Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i + 6,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST PBB
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Best PBB $i",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '4PBB',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST DANTON
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 1,
                'nama_juara'   => "Best Danton $i",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '5DANTON',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        Benefit::insert($benefits);
        $benefits = [
            ['tingkatan_id' => 1, 'nama_juara' => 'Best Populer Pasukan', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 1, 'nama_juara' => 'Best Favorit Ballot 1', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 1, 'nama_juara' => 'Best Favorit Ballot 2', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
        ];
        Benefit::insert($benefits);

        // Generate SMP-MTs
        $benefits = [
            [
                'tingkatan_id' => 2,
                'nama_juara'   => 'Juara Umum',
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '1UMUM',
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
                'nama_juara'   => "Juara $i Utama",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => $basePrize - ($deduction * ($i - 1)),
                'tipe'         => '2UTAMA',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Harapan",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 3,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Madya",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 6,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BINA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Bina",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 9,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MULA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Mula",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 12,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// PURWA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Purwa",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 15,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// CARAKA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Caraka",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 18,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// UTAMA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Utama Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Harapan Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i + 3,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Juara $i Madya Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i + 6,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST PBB
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Best PBB $i",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '4PBB',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST DANTON
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 2,
                'nama_juara'   => "Best Danton $i",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '5DANTON',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        Benefit::insert($benefits);
        $benefits = [
            ['tingkatan_id' => 2, 'nama_juara' => 'Best Populer Pasukan', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 2, 'nama_juara' => 'Best Favorit Ballot 1', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 2, 'nama_juara' => 'BEST Favorit Ballot 2', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
        ];
        Benefit::insert($benefits);

        // Generate SMA/SMK/MA
        $benefits = [
            [
                'tingkatan_id' => 3,
                'nama_juara'   => 'Juara Umum',
                'trophy'       => 'Trophy Bergilir',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '1UMUM',
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
                'nama_juara'   => "Juara $i Utama",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => $basePrize - ($deduction * ($i - 1)),
                'tipe'         => '2UTAMA',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Harapan",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 3,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Madya",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 6,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BINA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Bina",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 9,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MULA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Mula",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 12,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// PURWA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Purwa",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 15,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// CARAKA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Caraka",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 18,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// PERINTIS
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Perintis",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 21,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// POTENSIAL
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Potensial",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 24,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// SIAGA
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Siaga",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '2UTAMA',
                'prioritas'    => $i + 27,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// UTAMA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Utama Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// HARAPAN VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Harapan Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i + 3,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// MADYA VARFOR
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Juara $i Madya Varfor",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '3VARFOR',
                'prioritas'    => $i + 6,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST PBB
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Best PBB $i",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '4PBB',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        /// BEST DANTON
        for ($i = 1; $i <= 3; $i++) {
            $benefits[] = [
                'tingkatan_id' => 3,
                'nama_juara'   => "Best Danton $i",
                'trophy'       => 'Trophy Tetap',
                'hadiah'       => 'Sertifikat',
                'uang'         => 0,
                'tipe'         => '5DANTON',
                'prioritas'    => $i,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }
        Benefit::insert($benefits);
        $benefits = [
            ['tingkatan_id' => 3, 'nama_juara' => 'Best Populer Pasukan', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 3, 'nama_juara' => 'Best Favorit Ballot 1', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
            ['tingkatan_id' => 3, 'nama_juara' => 'Best Favorit Ballot 2', 'trophy' => 'Trophy Tetap', 'hadiah' => 'Tidak Ada', 'uang' => 0, 'tipe' => '6BEST', 'prioritas' => 0, 'created_at' => $now, 'updated_at' => $now,],
        ];
        Benefit::insert($benefits);
    }
}