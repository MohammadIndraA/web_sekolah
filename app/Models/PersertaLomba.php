<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersertaLomba extends Model
{
    protected $table = 'perserta_lombas';

    protected $fillable = [
        'daftar_sekolah_id',
        'kategori_lomba_id',
        'no_perserta',
    ];

    public function daftarSekolah()
    {
        return $this->belongsTo(DaftarSekolah::class);
    }

    public function kategoriLomba()
    {
        return $this->belongsTo(KategoriLomba::class);
    }
}
