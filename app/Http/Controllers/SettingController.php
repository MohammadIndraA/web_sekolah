<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\About;
use App\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('settings.index', compact('setting'));
    }

    public function store(SettingRequest $request)  
    {  
        try {  
            $data = $request->validated(); 
            // Cek apakah ini update atau create baru  
            $setting = Setting::find($request->id); // Gunakan find() untuk mendapatkan data jika ada
    
            // Handle logo upload  
            if ($request->hasFile('logo')) {  
                // Hapus file lama jika ada  
                if ($setting && $setting->logo && Storage::disk('public')->exists($setting->logo)) {  
                    Storage::disk('public')->delete($setting->logo);  
                }  
                // Upload file baru  
                $data['logo'] = uploadDokumen('setting', $request->file('logo'));  
            }  
        
            // Update atau create data  
            $setting = Setting::updateOrCreate(
                ['id' => $request->id], // Kondisi pencarian
                $data // Data yang akan di-insert atau di-update
            );  
        
            // Redirect dengan pesan sukses  
            return redirect()->route('setting.index')->with('success', 'Data Setting berhasil disimpan');  
        } catch (ModelNotFoundException $e) {  
            // Redirect dengan pesan error jika data tidak ditemukan  
            return redirect()->route('setting.index')->with('error', 'Data Setting tidak ditemukan');  
        } catch (\Exception $e) {  
            // Redirect dengan pesan error jika terjadi kesalahan lain  
            return redirect()->route('setting.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());  
        }  
    } 
}
