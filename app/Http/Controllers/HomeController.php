<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Event;
use App\Models\GambarLomba;
use App\Models\Jurusan;
use App\Models\KategoriLomba;
use App\Models\Setting;
use App\Models\Tamu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::where('status', 'aktif')->get();
        $kategoriLomba = KategoriLomba::where('status', 'aktif')->get();
        $banners = Banner::all();
        $imageLomba = GambarLomba::all();
        $events = Event::where('status', 'aktif')->get();
        $setting = Setting::first();
        return view('frontend.index', compact('jurusan', 'kategoriLomba', 'banners', 'imageLomba','events', 'setting'));
    }
    public function tamu()
    {
        $setting = Setting::first();
        return view('frontend.tamu', compact('setting'));
    }
    public function tamuSubmit(Request $request)
    {
       $data = $request->validate([
            'name' => 'required',
           'phone' => ['required', 'regex:/^(^\+62|62|^08)[\d]{8,12}$/'] , 
            'utusan' => 'required',
        ]);
        Tamu::create($data);
        return redirect()->route('tamu')->with('success', 'Terimakasih sudah isi form tamu');
    }

    public function about()
    {
        $setting = Setting::first();
        $about = About::first();
        return view('frontend.about', compact('setting', 'about'));
    }
}
