<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuspoin extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_id',
        'user_id',
        'pengurangan_id',
        'minus',
        'jumlah',
    ];

    public function pengurangan()
    {
        return $this->belongsTo(Pengurangan::class);
    }
}