<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pleton extends Model
{
    use HasFactory;
    protected $fillable = [
        'peserta_id',
        'nama_anggota',
        'kelas_anggota',
        'nis_anggota',
        'posisi',
        'foto_anggota',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}