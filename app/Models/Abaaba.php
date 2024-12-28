<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abaaba extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_id',
        'nama_abaaba',
        'urutan_abaaba',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}