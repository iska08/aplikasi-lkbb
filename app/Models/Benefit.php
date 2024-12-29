<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'tingkatan_id',
        'nama_juara',
        'hadiah',
        'uang',
        'tipe',
        'prioritas',
    ];

    // Relasi ke model Tingkatan
    public function tingkatan()
    {
        return $this->belongsTo(Tingkatan::class, 'tingkatan_id');
    }
}
