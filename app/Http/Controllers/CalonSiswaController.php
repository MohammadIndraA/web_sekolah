<?php

namespace App\Http\Controllers;

use App\Mail\KonfirmmasiPendaftaranSiswa;
use App\Models\CalonSiswa;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Validation\ValidationException;

class CalonSiswaController extends Controller
{
    // 
    public function index(Request $request)
    {
        $setting = Setting::first();
        if ($request->path() == 'siswa-pindahan') {
            return view('frontend.siswa_pindahan', compact('setting'));
        }
        return view('frontend.calon_siswa', compact('setting'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi data pendaftaran
            $data = $request->validate([
                'nama' => 'required|string',
                'email' => 'required|email',
                'jenis_kelamin' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'tempat_lahir' => 'required|string',
                'alamat' => 'required|string',
                'asal_sekolah' => 'required|string',
                'nama_ortu' => 'required|string',
                'nomor' => 'required|string',
                'kategori' => 'required|string',
                'prestasi' => 'nullable|string',
            ]);
    
            // Data untuk email
            $studentName = $data['nama'];
            $registrationDetails = [
                'Nama Siswa' => $data['nama'],
                'Jenis Kelamin' => $data['jenis_kelamin'],
                'Tanggal Lahir' => $data['tanggal_lahir'],
                'Alamat' => $data['alamat'],
                'Asal Sekolah' => $data['asal_sekolah'],
                'Nama Orang Tua' => $data['nama_ortu'],
                'Nomor Telepon' => $data['nomor'],
                'Kategori Pendaftaran' => $data['kategori'],
                'Prestasi' => $data['prestasi'] ?? 'Tidak ada',
            ];
            // simpan data ke database
            CalonSiswa::create($data);
            // Kirim email konfirmasi ke email orang tua
            $parentEmail = $data['email'];
            Mail::to($parentEmail)->send(new KonfirmmasiPendaftaranSiswa($studentName, $registrationDetails));
    
            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Terima kasih, pendaftaran calon siswa berhasil!');
        } catch (ValidationException $e) {
            // dd($e->errors());
            // Tangani error validasi
            return redirect()->back()
                             ->withErrors($e->errors())
                             ->withInput();
        } catch (Exception $e) {
            dd($e->getMessage());
            // Tangani error umum (misalnya, gagal mengirim email)
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan. Silakan coba lagi atau hubungi admin.')
                             ->withInput();
        }
    }
}
