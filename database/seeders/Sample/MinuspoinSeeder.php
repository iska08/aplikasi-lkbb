<?php

namespace Database\Seeders\Sample;

use App\Models\Minuspoin;
use App\Models\Peserta;
use App\Models\Pengurangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MinuspoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now(); // Waktu sekarang
        // Ambil semua peserta yang sudah ada
        $pesertas = Peserta::all();
        // Ambil semua pengurangan yang sudah di-seed sebelumnya
        $pengurangans = Pengurangan::all();
        // Jika tabel peserta atau pengurangan kosong, hentikan proses
        if ($pesertas->isEmpty() || $pengurangans->isEmpty()) {
            $this->command->info('Tabel Peserta atau Pengurangan kosong. Pastikan tabel sudah diisi sebelum menjalankan seeder ini.');
            return;
        }
        // Data Minuspoin yang akan di-insert
        $minuspoinData = [];
        // Looping setiap peserta untuk menambahkan data pengurangan
        foreach ($pesertas as $peserta) {
            foreach ($pengurangans as $pengurangan) {
                // Tambahkan data Minuspoin untuk setiap pengurangan
                $minuspoinData[] = [
                    'peserta_id'     => $peserta->id,
                    'user_id'        => 1, // Default user ID (ubah jika perlu)
                    'pengurangan_id' => $pengurangan->id,
                    'minus'          => $pengurangan->poin,
                    'jumlah'         => rand(0, 1), // Jumlah pengurangan secara acak (0-5)
                    'created_at'     => $now,
                    'updated_at'     => $now,
                ];
            }
        }
        // Insert ke tabel Minuspoin
        Minuspoin::insert($minuspoinData);
    }
}