<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tingkatan_id',
        'no_urut',
        'foto_pleton',
        'rekomendasi',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}