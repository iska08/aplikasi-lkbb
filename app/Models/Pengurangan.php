<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'keterangan',
        'per',
        'poin',
    ];
}