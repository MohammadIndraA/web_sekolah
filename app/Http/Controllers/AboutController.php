<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Models\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $about = About::first();
        $setting = Setting::first();
        return view('abouts.index', compact('about', 'setting'));
    }
    public function store(AboutRequest $request)  
    {  
        try {  
            $data = $request->validated();  
            
            // Cek apakah ini update atau create baru  
            $about = About::find($request->id); // Gunakan find() untuk mendapatkan data jika ada
    
            // Handle banner upload  
            if ($request->hasFile('banner')) {  
                // Hapus file lama jika ada  
                if ($about && $about->banner && Storage::disk('public')->exists($about->banner)) {  
                    Storage::disk('public')->delete($about->banner);  
                }  
                // Upload file baru  
                $data['banner'] = uploadDokumen('about/banner', $request->file('banner'));  
            }  
        
            // Handle thumbnail upload  
            if ($request->hasFile('thumbnail')) {  
                // Hapus file lama jika ada  
                if ($about && $about->thumbnail && Storage::disk('public')->exists($about->thumbnail)) {  
                    Storage::disk('public')->delete($about->thumbnail);  
                }  
                // Upload file baru  
                $data['thumbnail'] = uploadDokumen('about/thumbnail', $request->file('thumbnail'));  
            }  
    
            // Update atau create data  
            $about = About::updateOrCreate(
                ['id' => $request->id], // Kondisi pencarian
                $data // Data yang akan di-insert atau di-update
            );  
        
            // Redirect dengan pesan sukses  
            return redirect()->route('about.index')->with('success', 'Data About berhasil disimpan');  
        } catch (ModelNotFoundException $e) {  
            // Redirect dengan pesan error jika data tidak ditemukan  
            return redirect()->route('about.index')->with('error', 'Data About tidak ditemukan');  
        } catch (\Exception $e) {  
            // Redirect dengan pesan error jika terjadi kesalahan lain  
            return redirect()->route('about.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());  
        }  
    } 

    public function edit(Request $request)
    {
            $about = About::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $about,
        ]);
    }

    public function update(AboutRequest $request, $id)
    {
        try {
            $about = About::findOrFail($id);
            $data = $request->validated();  
            if ($request->hasFile('banner')) {
                if (Storage::disk('public')->exists($about->banner)) {
                   Storage::disk('public')->delete($about->banner);
                }
                $data['banner'] = uploadDokumen('about', $request->file('banner'));
            } 
            if ($request->hasFile('thumbnail')) {
                if (Storage::disk('public')->exists($about->thumbnail)) {
                   Storage::disk('public')->delete($about->thumbnail);
                }
                $data['thumbnail'] = uploadDokumen('about', $request->file('thumbnail'));
            } 
            $about->update($data); 

           // Redirect dengan pesan sukses
           return redirect()->back()->with('success', 'Data About berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            // Redirect dengan pesan error jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data About tidak ditemukan');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
    
    public function destroy(Request $request)
    {
        try {
            $about = About::findOrFail($request->id);
            if (Storage::disk('public')->exists($about->banner)) {
                Storage::disk('public')->delete($about->banner);
             }
            if (Storage::disk('public')->exists($about->thumbnail)) {
                Storage::disk('public')->delete($about->thumbnail);
             }
            $about->delete();
    
            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Data About berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            // Redirect dengan pesan error jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data About tidak ditemukan');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
    
}
