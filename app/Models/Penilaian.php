<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'abaaba_id',
        'skala1',
        'skala2',
        'skala3',
        'skala4',
        'skala5',
        'skala6',
        'skala7'
    ];

    public function nilaipbbdanton()
    {
        return $this->hasMany(Nilaipbbdanton::class);
    }
}