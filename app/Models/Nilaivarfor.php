<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilaivarfor extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_id',
        'user_id',
        'abaaba_id',
        'points'
    ];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }
}