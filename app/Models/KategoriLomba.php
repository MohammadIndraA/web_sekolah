<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriLomba extends Model
{
    protected $table = 'kategori_lombas';
    protected $fillable = [
        'name',
        'date',
        'alamat',
        'image',
        'deskripsi',
        'status',
    ];
}
