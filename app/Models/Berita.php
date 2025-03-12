<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $guarded = ['id']; 

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class);
    }

    public function tagBerita()
    {
        return $this->belongsTo(TagBerita::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        return $query
            ->when(isset($filters['search']), function ($q) use ($filters) {
                $q->where('title', 'like', '%' . trim($filters['search']) . '%');
            })
            ->when(isset($filters['kategori']), function ($q) use ($filters) {
                $q->whereHas('kategoriBerita', function ($subQuery) use ($filters) {
                    $subQuery->where('slug', $filters['kategori']);
                });
            })
            ->when(isset($filters['tag']), function ($q) use ($filters) {
                $q->whereHas('tagBerita', function ($subQuery) use ($filters) {
                    $subQuery->where('slug', $filters['tag']);
                });
            });
    }
}
