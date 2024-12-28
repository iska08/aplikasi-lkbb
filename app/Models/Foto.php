<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'pesertas';

    // Tentukan kolom mana yang bisa diisi (mass-assignable)
    protected $fillable = [
        'foto_pleton',
        'rekomendasi',
    ];
}
