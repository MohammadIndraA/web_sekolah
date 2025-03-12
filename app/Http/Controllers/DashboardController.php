<?php

namespace App\Http\Controllers;

use App\Models\DaftarSekolah;
use App\Models\Jurusan;
use App\Models\KategoriLomba;
use App\Models\PersertaLomba;
use App\Models\Tamu;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class DashboardController extends Controller
{
    public function index()
    {
     
       $sekolah = DaftarSekolah::all()->count();
       $kategori = KategoriLomba::all()->count();
       $peserta = PersertaLomba::all()->count();
       $jurusan = Jurusan::all()->count();
       $tamu = Tamu::all()->count(); 
       return view('dashboard.index', compact('sekolah','kategori','peserta','jurusan','tamu'));
    }
}
