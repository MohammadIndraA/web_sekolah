<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagBerita extends Model
{
    protected $table = 'tag_beritas';

    protected $fillable = [
        'name',
        'slug',
    ];
}
