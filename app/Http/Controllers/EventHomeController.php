<?php

namespace App\Http\Controllers;

use App\Models\DaftarSekolah;
use App\Models\PersertaLomba;
use App\Models\Setting;
use Illuminate\Http\Request;

class EventHomeController extends Controller
{
    public function index()
    {
        $sekolah = DaftarSekolah::all();
        if (isset($_REQUEST['search'])) {
            $sekolah = DaftarSekolah::where('name', 'like', '%' . $_REQUEST['search'] . '%')->get();
        }
        $daftarPeserta = PersertaLomba::with('daftarSekolah', 'kategoriLomba')->paginate(12);
        if (isset($_REQUEST['sekolah_id'])) {
            $daftarPeserta = PersertaLomba::with('daftarSekolah', 'kategoriLomba')->where('daftar_sekolah_id', $_REQUEST['sekolah_id'])->paginate(5)->withQueryString();
        }
        $setting = Setting::first();
        return view('frontend.event', compact('sekolah', 'daftarPeserta', 'setting'));
    }

    public function konfirmasi(Request $request)
    {
        try {
            // Temukan peserta berdasarkan ID
            $sekolah = DaftarSekolah::where('id', $request->sekolah_id)->first();
            if (!$sekolah) {
                abort(404);
            }
            // Update status dan deskripsi
            $sekolah->update([
                'status' => 'aktif',
                'deskripsi' => $request->deskripsi ?? '',
            ]);
    
            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Konfirmasi berhasil!');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi masalah
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
}
