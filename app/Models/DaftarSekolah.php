<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarSekolah extends Model
{
    protected $table = 'daftar_sekolahs';

    protected $fillable = [
        'name',
        'status',
        'deskripsi',
    ];
}
