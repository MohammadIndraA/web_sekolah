<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = 'tamus';

    protected $fillable = [
        'name', 'phone', 'utusan',
    ];
}
