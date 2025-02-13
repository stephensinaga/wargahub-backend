<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengaduan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pengaduans';

    protected $fillable = ['nama'];
}
