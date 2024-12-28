<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_pendaftaran_buka',
        'tgl_pendaftaran_tutup',
        'lokasi_pendaftaran',
        'tgl_tm',
        'lokasi_tm',
        'tgl_pelaksanaan',
        'lokasi_pelaksanaan'
    ];
}
