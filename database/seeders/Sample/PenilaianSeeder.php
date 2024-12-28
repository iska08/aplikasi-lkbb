<?php

namespace Database\Seeders\Sample;

use App\Models\Penilaian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PenilaianSeeder extends Seeder
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
        // Seeder untuk Penilaian
        $penilaians = [
            // PBB TAMBAHAN 1
            ['abaaba_id' => '1', 'skala1' => '28', 'skala2' => '30', 'skala3' => '32', 'skala4' => '34', 'skala5' => '36', 'skala6' => '38', 'skala7' => '40', 'created_at' => $now, 'updated_at' => $now,],
            // PBB DI TEMPAT
            ['abaaba_id' => '2', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '3', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '4', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '5', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '6', 'skala1' => '11', 'skala2' => '13', 'skala3' => '15', 'skala4' => '17', 'skala5' => '19', 'skala6' => '21', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '7', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '8', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '9', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '10', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '11', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '12', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '13', 'skala1' => '11', 'skala2' => '13', 'skala3' => '15', 'skala4' => '17', 'skala5' => '19', 'skala6' => '21', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            // PBB BERJALAN KE BERJALAN
            ['abaaba_id' => '14', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '15', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '16', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '17', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '18', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '19', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '20', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '21', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '22', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '23', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '24', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '25', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '26', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '27', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            // PBB TAMBAHAN 2
            ['abaaba_id' => '28', 'skala1' => '22', 'skala2' => '24', 'skala3' => '26', 'skala4' => '28', 'skala5' => '30', 'skala6' => '32', 'skala7' => '34', 'created_at' => $now, 'updated_at' => $now,],
            // DANTON
            ['abaaba_id' => '29', 'skala1' => '9', 'skala2' => '11', 'skala3' => '13', 'skala4' => '15', 'skala5' => '17', 'skala6' => '19', 'skala7' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '30', 'skala1' => '5', 'skala2' => '7', 'skala3' => '9', 'skala4' => '11', 'skala5' => '13', 'skala6' => '15', 'skala7' => '17', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '31', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '32', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '33', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            // VARIASI
            ['abaaba_id' => '34', 'skala1' => '2', 'skala2' => '4', 'skala3' => '6', 'skala4' => '8', 'skala5' => '10', 'skala6' => '12', 'skala7' => '14', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '35', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '36', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '37', 'skala1' => '2', 'skala2' => '4', 'skala3' => '6', 'skala4' => '8', 'skala5' => '10', 'skala6' => '12', 'skala7' => '14', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '38', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '39', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            // FORMASI
            ['abaaba_id' => '40', 'skala1' => '3', 'skala2' => '5', 'skala3' => '7', 'skala4' => '9', 'skala5' => '11', 'skala6' => '13', 'skala7' => '15', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '41', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '42', 'skala1' => '7', 'skala2' => '9', 'skala3' => '11', 'skala4' => '13', 'skala5' => '15', 'skala6' => '17', 'skala7' => '19', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '43', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '44', 'skala1' => '9', 'skala2' => '11', 'skala3' => '13', 'skala4' => '15', 'skala5' => '17', 'skala6' => '19', 'skala7' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '45', 'skala1' => '3', 'skala2' => '5', 'skala3' => '7', 'skala4' => '9', 'skala5' => '11', 'skala6' => '13', 'skala7' => '15', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '46', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
        ];
        Penilaian::insert($penilaians);

        // SMP/MTs Sederajat
        // Seeder untuk Penilaian
        $penilaians = [
            // PBB TAMBAHAN 1
            ['abaaba_id' => '47', 'skala1' => '28', 'skala2' => '30', 'skala3' => '32', 'skala4' => '34', 'skala5' => '36', 'skala6' => '38', 'skala7' => '40', 'created_at' => $now, 'updated_at' => $now,],
            // PBB BERJALAN KE BERJALAN
            ['abaaba_id' => '48', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '49', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '50', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '51', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '52', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '53', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '54', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '55', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '56', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '57', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '58', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '59', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '60', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '61', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            // PBB DI TEMPAT
            ['abaaba_id' => '62', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '63', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '64', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '65', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '66', 'skala1' => '11', 'skala2' => '13', 'skala3' => '15', 'skala4' => '17', 'skala5' => '19', 'skala6' => '21', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '67', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '68', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '69', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '70', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '71', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '72', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '73', 'skala1' => '11', 'skala2' => '13', 'skala3' => '15', 'skala4' => '17', 'skala5' => '19', 'skala6' => '21', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            // PBB BERPINDAH TEMPAT
            ['abaaba_id' => '74', 'skala1' => '18', 'skala2' => '20', 'skala3' => '22', 'skala4' => '24', 'skala5' => '26', 'skala6' => '28', 'skala7' => '30', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '75', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '76', 'skala1' => '18', 'skala2' => '20', 'skala3' => '22', 'skala4' => '24', 'skala5' => '26', 'skala6' => '28', 'skala7' => '30', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '77', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            // PBB TAMBAHAN 2
            ['abaaba_id' => '78', 'skala1' => '22', 'skala2' => '24', 'skala3' => '26', 'skala4' => '28', 'skala5' => '30', 'skala6' => '32', 'skala7' => '34', 'created_at' => $now, 'updated_at' => $now,],
            // DANTON
            ['abaaba_id' => '79', 'skala1' => '9', 'skala2' => '11', 'skala3' => '13', 'skala4' => '15', 'skala5' => '17', 'skala6' => '19', 'skala7' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '80', 'skala1' => '5', 'skala2' => '7', 'skala3' => '9', 'skala4' => '11', 'skala5' => '13', 'skala6' => '15', 'skala7' => '17', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '81', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '82', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '83', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            // VARIASI
            ['abaaba_id' => '84', 'skala1' => '2', 'skala2' => '4', 'skala3' => '6', 'skala4' => '8', 'skala5' => '10', 'skala6' => '12', 'skala7' => '14', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '85', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '86', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '87', 'skala1' => '2', 'skala2' => '4', 'skala3' => '6', 'skala4' => '8', 'skala5' => '10', 'skala6' => '12', 'skala7' => '14', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '88', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '89', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            // FORMASI
            ['abaaba_id' => '90', 'skala1' => '3', 'skala2' => '5', 'skala3' => '7', 'skala4' => '9', 'skala5' => '11', 'skala6' => '13', 'skala7' => '15', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '91', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '92', 'skala1' => '7', 'skala2' => '9', 'skala3' => '11', 'skala4' => '13', 'skala5' => '15', 'skala6' => '17', 'skala7' => '19', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '93', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '94', 'skala1' => '9', 'skala2' => '11', 'skala3' => '13', 'skala4' => '15', 'skala5' => '17', 'skala6' => '19', 'skala7' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '95', 'skala1' => '3', 'skala2' => '5', 'skala3' => '7', 'skala4' => '9', 'skala5' => '11', 'skala6' => '13', 'skala7' => '15', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '96', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
        ];
        Penilaian::insert($penilaians);

        // SMA/SMK/MA Sederajat
        // Seeder untuk Penilaian
        $penilaians = [
            // PBB TAMBAHAN 1
            ['abaaba_id' => '97', 'skala1' => '28', 'skala2' => '30', 'skala3' => '32', 'skala4' => '34', 'skala5' => '36', 'skala6' => '38', 'skala7' => '40', 'created_at' => $now, 'updated_at' => $now,],
            // PBB BERJALAN KE BERJALAN
            ['abaaba_id' => '98', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '99', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '100', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '101', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '102', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '103', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '104', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '105', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '106', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '107', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '108', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '109', 'skala1' => '21', 'skala2' => '23', 'skala3' => '25', 'skala4' => '27', 'skala5' => '29', 'skala6' => '31', 'skala7' => '33', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '110', 'skala1' => '23', 'skala2' => '25', 'skala3' => '27', 'skala4' => '29', 'skala5' => '31', 'skala6' => '33', 'skala7' => '35', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '111', 'skala1' => '19', 'skala2' => '21', 'skala3' => '23', 'skala4' => '25', 'skala5' => '27', 'skala6' => '29', 'skala7' => '31', 'created_at' => $now, 'updated_at' => $now,],
            // PBB DI TEMPAT
            ['abaaba_id' => '112', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '113', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '114', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '115', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '116', 'skala1' => '11', 'skala2' => '13', 'skala3' => '15', 'skala4' => '17', 'skala5' => '19', 'skala6' => '21', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '117', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '118', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '119', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '120', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '121', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '122', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '123', 'skala1' => '11', 'skala2' => '13', 'skala3' => '15', 'skala4' => '17', 'skala5' => '19', 'skala6' => '21', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            // PBB BERPINDAH TEMPAT
            ['abaaba_id' => '124', 'skala1' => '18', 'skala2' => '20', 'skala3' => '22', 'skala4' => '24', 'skala5' => '26', 'skala6' => '28', 'skala7' => '30', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '125', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '126', 'skala1' => '18', 'skala2' => '20', 'skala3' => '22', 'skala4' => '24', 'skala5' => '26', 'skala6' => '28', 'skala7' => '30', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '127', 'skala1' => '17', 'skala2' => '19', 'skala3' => '21', 'skala4' => '23', 'skala5' => '25', 'skala6' => '27', 'skala7' => '29', 'created_at' => $now, 'updated_at' => $now,],
            // PBB TAMBAHAN 2
            ['abaaba_id' => '128', 'skala1' => '22', 'skala2' => '24', 'skala3' => '26', 'skala4' => '28', 'skala5' => '30', 'skala6' => '32', 'skala7' => '34', 'created_at' => $now, 'updated_at' => $now,],
            // DANTON
            ['abaaba_id' => '129', 'skala1' => '9', 'skala2' => '11', 'skala3' => '13', 'skala4' => '15', 'skala5' => '17', 'skala6' => '19', 'skala7' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '130', 'skala1' => '5', 'skala2' => '7', 'skala3' => '9', 'skala4' => '11', 'skala5' => '13', 'skala6' => '15', 'skala7' => '17', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '131', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '132', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '133', 'skala1' => '10', 'skala2' => '12', 'skala3' => '14', 'skala4' => '16', 'skala5' => '18', 'skala6' => '20', 'skala7' => '22', 'created_at' => $now, 'updated_at' => $now,],
            // VARIASI
            ['abaaba_id' => '134', 'skala1' => '2', 'skala2' => '4', 'skala3' => '6', 'skala4' => '8', 'skala5' => '10', 'skala6' => '12', 'skala7' => '14', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '135', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '136', 'skala1' => '8', 'skala2' => '10', 'skala3' => '12', 'skala4' => '14', 'skala5' => '16', 'skala6' => '18', 'skala7' => '20', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '137', 'skala1' => '2', 'skala2' => '4', 'skala3' => '6', 'skala4' => '8', 'skala5' => '10', 'skala6' => '12', 'skala7' => '14', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '138', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '139', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            // FORMASI
            ['abaaba_id' => '140', 'skala1' => '3', 'skala2' => '5', 'skala3' => '7', 'skala4' => '9', 'skala5' => '11', 'skala6' => '13', 'skala7' => '15', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '141', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '142', 'skala1' => '7', 'skala2' => '9', 'skala3' => '11', 'skala4' => '13', 'skala5' => '15', 'skala6' => '17', 'skala7' => '19', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '143', 'skala1' => '6', 'skala2' => '8', 'skala3' => '10', 'skala4' => '12', 'skala5' => '14', 'skala6' => '16', 'skala7' => '18', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '144', 'skala1' => '9', 'skala2' => '11', 'skala3' => '13', 'skala4' => '15', 'skala5' => '17', 'skala6' => '19', 'skala7' => '21', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '145', 'skala1' => '3', 'skala2' => '5', 'skala3' => '7', 'skala4' => '9', 'skala5' => '11', 'skala6' => '13', 'skala7' => '15', 'created_at' => $now, 'updated_at' => $now,],
            ['abaaba_id' => '146', 'skala1' => '4', 'skala2' => '6', 'skala3' => '8', 'skala4' => '10', 'skala5' => '12', 'skala6' => '14', 'skala7' => '16', 'created_at' => $now, 'updated_at' => $now,],
        ];
        Penilaian::insert($penilaians);
    }
}