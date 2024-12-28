<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'tingkatan_id',
        'jenis_name',
        'urutan',
        'tipe',
    ];

    // Jika Anda menggunakan route model binding, gunakan kunci default 'id'
    public function getRouteKeyName()
    {
        return 'id';
    }

    // Relasi ke model Tingkatan
    public function tingkatan()
    {
        return $this->belongsTo(Tingkatan::class, 'tingkatan_id');
    }
}