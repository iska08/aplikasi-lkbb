<?php

namespace Database\Seeders\Sample;

use App\Models\Pengurangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PenguranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now(); // Waktu sekarang
        //Seeder untuk Pengurangan
        $pengurangans = [
            [
                'keterangan' => 'Tidak membawa 2 POLYBAG besar saat registrasi',
                'per'        => 'Polybag/team',
                'poin'       => '25',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Pasukan tidak lengkap',
                'per'        => 'orang',
                'poin'       => '100',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Peserta tampil melebihi waktu',
                'per'        => '30 detik dan berlaku kelipatan',
                'poin'       => '25',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Administrasi tidak lengkap',
                'per'        => 'item',
                'poin'       => '50',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Peserta pingsan saat penampilan',
                'per'        => 'orang',
                'poin'       => '100',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Terlambat mengumpulkan administrasi dan/atau foto best',
                'per'        => 'item',
                'poin'       => '50',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Melewati/menginjak garis perlombaan',
                'per'        => 'orang',
                'poin'       => '10',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Tidak menampilkan Variasi',
                'per'        => '-',
                'poin'       => '500',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Tidak menampilkan Formasi',
                'per'        => '-',
                'poin'       => '500',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Merusak fasilitas di area perlombaan',
                'per'        => '-',
                'poin'       => '1000',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Protes, menentang, dan/atau melawan panitia',
                'per'        => '-',
                'poin'       => '1000',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'keterangan' => 'Terlambat Check In',
                'per'        => '5 menit',
                'poin'       => '20',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        Pengurangan::insert($pengurangans);
    }
}