<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cakupan',
        'alamat',
        'maps',
        'keterangan_lkbb',
        'total_pembinaan',
        'htm',
    ];
}
