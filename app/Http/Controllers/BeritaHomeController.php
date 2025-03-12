<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Setting;
use App\Models\TagBerita;
use Illuminate\Http\Request;

class BeritaHomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $kategoris = KategoriBerita::all();
        $filters = request()->only(['search', 'kategori','tag']);
        $beritas = Berita::with('user')
                ->filter($filters)
                ->orderBy('id', 'DESC')
                ->paginate(6)
                ->withQueryString();        
        $tags = TagBerita::all();
        return view('frontend.berita', compact('setting', 'beritas', 'kategoris', 'tags'));
    }

    public function show($slug) 
    {
        $berita = Berita::where('slug', $slug)->first();
        if (!$berita) {
            abort(404);
        }
        $setting = Setting::first();
        $kategoris = KategoriBerita::all();
        $setting = Setting::first();
        $tags = TagBerita::all();
        return view('frontend.berita_detail',compact('berita', 'setting', 'kategoris','tags'));
    }
}
