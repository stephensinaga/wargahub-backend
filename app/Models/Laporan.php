<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'category',
        'photo_1',
        'photo_2',
        'photo_3',
        'description',
        'latitude',
        'longitude',
        'address',
        'tanggal',
    ];
}
