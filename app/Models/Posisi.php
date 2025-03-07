<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_posisi',
        'keterangan'
    ];

    public function pletons()
    {
        return $this->hasMany(Pleton::class);
    }
}