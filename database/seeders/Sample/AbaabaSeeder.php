<?php

namespace Database\Seeders\Sample;

use App\Models\Abaaba;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AbaabaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now(); // Waktu sekarang
        // Seeder untuk Aba-Aba
        $abaabas = [
            // SD/MI Sederajat
            // PBB TAMBAHAN 1
            ['jenis_id' => '1', 'nama_abaaba' => 'Berkumpul', 'urutan_abaaba' => '1', 'created_at' => $now, 'updated_at' => $now,],
            // PBB DI TEMPAT
            ['jenis_id' => '2', 'nama_abaaba' => 'Sikap Sempurna', 'urutan_abaaba' => '2', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => '½ Lengan Lencang Kiri', 'urutan_abaaba' => '3', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Lencang Kanan', 'urutan_abaaba' => '4', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Hormat', 'urutan_abaaba' => '5', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Hitung', 'urutan_abaaba' => '6', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Hadap Serong Kanan', 'urutan_abaaba' => '7', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Istirahat di Tempat (Parade)', 'urutan_abaaba' => '8', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Parade Periksa Kerapian (Istirahat Biasa)', 'urutan_abaaba' => '9', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Hadap Serong Kiri', 'urutan_abaaba' => '10', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Balik Kanan', 'urutan_abaaba' => '11', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Hadap Kiri', 'urutan_abaaba' => '12', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Lencang Depan', 'urutan_abaaba' => '13', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '2', 'nama_abaaba' => 'Jalan di Tempat', 'urutan_abaaba' => '14', 'created_at' => $now, 'updated_at' => $now,],
            // PBB BERJALAN KE BERJALAN
            ['jenis_id' => '3', 'nama_abaaba' => 'Hadap Kanan Maju', 'urutan_abaaba' => '15', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Ganti Langkah', 'urutan_abaaba' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Tiap-tiap Banjar 2x Belok Kiri', 'urutan_abaaba' => '17', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Langkah Tegap', 'urutan_abaaba' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Hormat Kanan', 'urutan_abaaba' => '19', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Langkah Biasa', 'urutan_abaaba' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Belok Kiri 2x', 'urutan_abaaba' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Langkah Biasa ke Lari', 'urutan_abaaba' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Langkah Lari ke Langkah Biasa', 'urutan_abaaba' => '23', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Tiap-tiap Banjar 2x Belok Kanan', 'urutan_abaaba' => '24', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Langkah Perlahan', 'urutan_abaaba' => '25', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => '2x Belok Kanan', 'urutan_abaaba' => '26', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '3', 'nama_abaaba' => 'Hadap Kiri Henti', 'urutan_abaaba' => '27', 'created_at' => $now, 'updated_at' => $now,],
            // PBB TAMBAHAN 2
            ['jenis_id' => '4', 'nama_abaaba' => 'Bubar', 'urutan_abaaba' => '28', 'created_at' => $now, 'updated_at' => $now,],
            // DANTON
            ['jenis_id' => '5', 'nama_abaaba' => 'Penguasaan materi', 'urutan_abaaba' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '5', 'nama_abaaba' => 'Sikap', 'urutan_abaaba' => '30', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '5', 'nama_abaaba' => 'Ketegasan', 'urutan_abaaba' => '31', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '5', 'nama_abaaba' => 'Intonasi dan Artikulasi', 'urutan_abaaba' => '32', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '5', 'nama_abaaba' => 'Penguasaan lapangan', 'urutan_abaaba' => '33', 'created_at' => $now, 'updated_at' => $now,],
            // VARIASI
            ['jenis_id' => '6', 'nama_abaaba' => 'Opening celebration', 'urutan_abaaba' => '34', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '6', 'nama_abaaba' => 'Kesesuaian Tema dan Konsep', 'urutan_abaaba' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '6', 'nama_abaaba' => 'Pesan yang Disampaikan', 'urutan_abaaba' => '36', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '6', 'nama_abaaba' => 'Kekompakan Pasukan', 'urutan_abaaba' => '37', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '6', 'nama_abaaba' => 'Semangat Pasukan', 'urutan_abaaba' => '38', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '6', 'nama_abaaba' => 'Kreatifitas Gerakan', 'urutan_abaaba' => '39', 'created_at' => $now, 'updated_at' => $now,],
            // FORMASI
            ['jenis_id' => '7', 'nama_abaaba' => 'Proses Buka Formasi', 'urutan_abaaba' => '40', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '7', 'nama_abaaba' => 'Penguasaan Lapangan', 'urutan_abaaba' => '41', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '7', 'nama_abaaba' => 'Tingkat Kesulitan', 'urutan_abaaba' => '42', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '7', 'nama_abaaba' => 'Bentuk Formasi', 'urutan_abaaba' => '43', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '7', 'nama_abaaba' => 'Pesan yang Disampaikan', 'urutan_abaaba' => '44', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '7', 'nama_abaaba' => 'Proses Tutup Formasi', 'urutan_abaaba' => '45', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '7', 'nama_abaaba' => 'Ending Celebration', 'urutan_abaaba' => '46', 'created_at' => $now, 'updated_at' => $now,],

            // SMP/MTs Sederajat
            // PBB TAMBAHAN 1
            ['jenis_id' => '8', 'nama_abaaba' => 'Berkumpul', 'urutan_abaaba' => '1', 'created_at' => $now, 'updated_at' => $now,],
            // PBB BERJALAN KE BERJALAN
            ['jenis_id' => '9', 'nama_abaaba' => 'Sikap Sempurna', 'urutan_abaaba' => '2', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Hadap Kanan Maju', 'urutan_abaaba' => '3', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Ganti Langkah', 'urutan_abaaba' => '4', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Tiap-tiap Banjar 2x Belok Kiri', 'urutan_abaaba' => '5', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Langkah Tegap', 'urutan_abaaba' => '6', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Hormat Kanan', 'urutan_abaaba' => '7', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Langkah Biasa', 'urutan_abaaba' => '8', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Belok Kiri 2x', 'urutan_abaaba' => '9', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Langkah Biasa ke Lari', 'urutan_abaaba' => '10', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Langkah Lari ke Langkah Biasa', 'urutan_abaaba' => '11', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Tiap-tiap Banjar 2x Belok Kanan', 'urutan_abaaba' => '12', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Langkah Perlahan', 'urutan_abaaba' => '13', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => '2x Belok Kanan', 'urutan_abaaba' => '14', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '9', 'nama_abaaba' => 'Hadap Kiri Henti', 'urutan_abaaba' => '15', 'created_at' => $now, 'updated_at' => $now,],
            // PBB DI TEMPAT
            ['jenis_id' => '10', 'nama_abaaba' => '½ Lengan Lencang Kiri', 'urutan_abaaba' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Lencang Kanan', 'urutan_abaaba' => '17', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Hormat', 'urutan_abaaba' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Hitung', 'urutan_abaaba' => '19', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Hadap Serong Kanan', 'urutan_abaaba' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Istirahat di Tempat (Parade)', 'urutan_abaaba' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Parade Periksa Kerapian (Istirahat Biasa)', 'urutan_abaaba' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Hadap Serong Kiri', 'urutan_abaaba' => '23', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Balik Kanan', 'urutan_abaaba' => '24', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Hadap Kiri', 'urutan_abaaba' => '25', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Lencang Depan', 'urutan_abaaba' => '26', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '10', 'nama_abaaba' => 'Jalan di Tempat', 'urutan_abaaba' => '27', 'created_at' => $now, 'updated_at' => $now,],
            // BERPINDAH TEMPAT
            ['jenis_id' => '11', 'nama_abaaba' => '4 langkah ke Kanan', 'urutan_abaaba' => '28', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '11', 'nama_abaaba' => '3 Langkah ke Depan', 'urutan_abaaba' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '11', 'nama_abaaba' => '4 Langkah ke Kiri', 'urutan_abaaba' => '30', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '11', 'nama_abaaba' => '3 Langkah ke Belakang', 'urutan_abaaba' => '31', 'created_at' => $now, 'updated_at' => $now,],
            // PBB TAMBAHAN 2
            ['jenis_id' => '12', 'nama_abaaba' => 'Bubar', 'urutan_abaaba' => '32', 'created_at' => $now, 'updated_at' => $now,],
            // DANTON
            ['jenis_id' => '13', 'nama_abaaba' => 'Penguasaan materi', 'urutan_abaaba' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '13', 'nama_abaaba' => 'Sikap', 'urutan_abaaba' => '34', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '13', 'nama_abaaba' => 'Ketegasan', 'urutan_abaaba' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '13', 'nama_abaaba' => 'Intonasi dan Artikulasi', 'urutan_abaaba' => '36', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '13', 'nama_abaaba' => 'Penguasaan lapangan', 'urutan_abaaba' => '37', 'created_at' => $now, 'updated_at' => $now,],
            // VARIASI
            ['jenis_id' => '14', 'nama_abaaba' => 'Opening celebration', 'urutan_abaaba' => '38', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '14', 'nama_abaaba' => 'Kesesuaian Tema dan Konsep', 'urutan_abaaba' => '39', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '14', 'nama_abaaba' => 'Pesan yang Disampaikan', 'urutan_abaaba' => '40', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '14', 'nama_abaaba' => 'Kekompakan Pasukan', 'urutan_abaaba' => '41', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '14', 'nama_abaaba' => 'Semangat Pasukan', 'urutan_abaaba' => '42', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '14', 'nama_abaaba' => 'Kreatifitas Gerakan', 'urutan_abaaba' => '43', 'created_at' => $now, 'updated_at' => $now,],
            // FORMASI
            ['jenis_id' => '15', 'nama_abaaba' => 'Proses Buka Formasi', 'urutan_abaaba' => '44', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '15', 'nama_abaaba' => 'Penguasaan Lapangan', 'urutan_abaaba' => '45', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '15', 'nama_abaaba' => 'Tingkat Kesulitan', 'urutan_abaaba' => '46', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '15', 'nama_abaaba' => 'Bentuk Formasi', 'urutan_abaaba' => '47', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '15', 'nama_abaaba' => 'Pesan yang Disampaikan', 'urutan_abaaba' => '48', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '15', 'nama_abaaba' => 'Proses Tutup Formasi', 'urutan_abaaba' => '49', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '15', 'nama_abaaba' => 'Ending Celebration', 'urutan_abaaba' => '50', 'created_at' => $now, 'updated_at' => $now,],

            // SMA/SMK/MA Sederajat
            // PBB TAMBAHAN 1
            ['jenis_id' => '16', 'nama_abaaba' => 'Berkumpul', 'urutan_abaaba' => '1', 'created_at' => $now, 'updated_at' => $now,],
            // PBB BERJALAN KE BERJALAN
            ['jenis_id' => '17', 'nama_abaaba' => 'Sikap Sempurna', 'urutan_abaaba' => '2', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Hadap Kanan Maju', 'urutan_abaaba' => '3', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Ganti Langkah', 'urutan_abaaba' => '4', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Tiap-tiap Banjar 2x Belok Kiri', 'urutan_abaaba' => '5', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Langkah Tegap', 'urutan_abaaba' => '6', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Hormat Kanan', 'urutan_abaaba' => '7', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Langkah Biasa', 'urutan_abaaba' => '8', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Belok Kiri 2x', 'urutan_abaaba' => '9', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Langkah Biasa ke Lari', 'urutan_abaaba' => '10', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Langkah Lari ke Langkah Biasa', 'urutan_abaaba' => '11', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Tiap-tiap Banjar 2x Belok Kanan', 'urutan_abaaba' => '12', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Langkah Perlahan', 'urutan_abaaba' => '13', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => '2x Belok Kanan', 'urutan_abaaba' => '14', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '17', 'nama_abaaba' => 'Hadap Kiri Henti', 'urutan_abaaba' => '15', 'created_at' => $now, 'updated_at' => $now,],
            // PBB DI TEMPAT
            ['jenis_id' => '18', 'nama_abaaba' => '½ Lengan Lencang Kiri', 'urutan_abaaba' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Lencang Kanan', 'urutan_abaaba' => '17', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Hormat', 'urutan_abaaba' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Hitung', 'urutan_abaaba' => '19', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Hadap Serong Kanan', 'urutan_abaaba' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Istirahat di Tempat (Parade)', 'urutan_abaaba' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Parade Periksa Kerapian (Istirahat Biasa)', 'urutan_abaaba' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Hadap Serong Kiri', 'urutan_abaaba' => '23', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Balik Kanan', 'urutan_abaaba' => '24', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Hadap Kiri', 'urutan_abaaba' => '25', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Lencang Depan', 'urutan_abaaba' => '26', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '18', 'nama_abaaba' => 'Jalan di Tempat', 'urutan_abaaba' => '27', 'created_at' => $now, 'updated_at' => $now,],
            // BERPINDAH TEMPAT
            ['jenis_id' => '19', 'nama_abaaba' => '4 langkah ke Kanan', 'urutan_abaaba' => '28', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '19', 'nama_abaaba' => '3 Langkah ke Depan', 'urutan_abaaba' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '19', 'nama_abaaba' => '4 Langkah ke Kiri', 'urutan_abaaba' => '30', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '19', 'nama_abaaba' => '3 Langkah ke Belakang', 'urutan_abaaba' => '31', 'created_at' => $now, 'updated_at' => $now,],
            // PBB TAMBAHAN 2
            ['jenis_id' => '20', 'nama_abaaba' => 'Bubar', 'urutan_abaaba' => '32', 'created_at' => $now, 'updated_at' => $now,],
            // DANTON
            ['jenis_id' => '21', 'nama_abaaba' => 'Penguasaan materi', 'urutan_abaaba' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '21', 'nama_abaaba' => 'Sikap', 'urutan_abaaba' => '34', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '21', 'nama_abaaba' => 'Ketegasan', 'urutan_abaaba' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '21', 'nama_abaaba' => 'Intonasi dan Artikulasi', 'urutan_abaaba' => '36', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '21', 'nama_abaaba' => 'Penguasaan lapangan', 'urutan_abaaba' => '37', 'created_at' => $now, 'updated_at' => $now,],
            // VARIASI
            ['jenis_id' => '22', 'nama_abaaba' => 'Opening celebration', 'urutan_abaaba' => '38', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '22', 'nama_abaaba' => 'Kesesuaian Tema dan Konsep', 'urutan_abaaba' => '39', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '22', 'nama_abaaba' => 'Pesan yang Disampaikan', 'urutan_abaaba' => '40', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '22', 'nama_abaaba' => 'Kekompakan Pasukan', 'urutan_abaaba' => '41', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '22', 'nama_abaaba' => 'Semangat Pasukan', 'urutan_abaaba' => '42', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '22', 'nama_abaaba' => 'Kreatifitas Gerakan', 'urutan_abaaba' => '43', 'created_at' => $now, 'updated_at' => $now,],
            // FORMASI
            ['jenis_id' => '23', 'nama_abaaba' => 'Proses Buka Formasi', 'urutan_abaaba' => '44', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '23', 'nama_abaaba' => 'Penguasaan Lapangan', 'urutan_abaaba' => '45', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '23', 'nama_abaaba' => 'Tingkat Kesulitan', 'urutan_abaaba' => '46', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '23', 'nama_abaaba' => 'Bentuk Formasi', 'urutan_abaaba' => '47', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '23', 'nama_abaaba' => 'Pesan yang Disampaikan', 'urutan_abaaba' => '48', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '23', 'nama_abaaba' => 'Proses Tutup Formasi', 'urutan_abaaba' => '49', 'created_at' => $now, 'updated_at' => $now,],
            ['jenis_id' => '23', 'nama_abaaba' => 'Ending Celebration', 'urutan_abaaba' => '50', 'created_at' => $now, 'updated_at' => $now,],
        ];
        Abaaba::insert($abaabas);
    }
}