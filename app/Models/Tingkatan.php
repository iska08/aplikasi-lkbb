<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tingkatan extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'nama_tingkatan',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_tingkatan'
            ]
        ];
    }

    public function jenis()
    {
        return $this->hasMany(Jenis::class, 'tingkatan_id');
    }
}