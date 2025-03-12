<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    protected $fillable = [
        'name',
        'status',
        'deskripsi',
        'image',
    ];
}
