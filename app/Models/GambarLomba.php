<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarLomba extends Model
{
    protected $table = 'gambar_lombas';

    protected $fillable = [
        'lomba_id',
        'gambar',
    ];
}
