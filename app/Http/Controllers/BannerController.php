<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('permission:view-kategori-dokumen', ['only' => ['index','show']]),
            new Middleware('permission:create-kategori-dokumen', ['only' => ['create','store']]),
            new Middleware('permission:edit-kategori-dokumen', ['only' => ['edit','update']]),
            new Middleware('permission:delete-kategori-dokumen', ['only' => ['destroy']]),
        ];
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $banner = Banner::orderBy('id', 'desc');
            return datatables($banner)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                
                    // Tambahkan tombol edit jika memiliki izin
                    // if (auth()->user()->can('edit-kategori-dokumen')) {
                        $editButton = '
                            <button onclick="editFunc(`' . $row->id . '`)" class="btn btn-primary btn-flat btn-sm" title="Edit">
                                <i class="dripicons-document-edit"></i>
                            </button>
                        ';
                    // }
                
                    // Tambahkan tombol delete jika memiliki izin
                    // if (auth()->user()->can('delete-kategori-dokumen')) {
                        $deleteButton = '
                            <button onclick="deleteFunc(`' . $row->id . '`)" class="btn btn-danger btn-flat btn-sm" title="Delete">
                                <i class="dripicons-trash"></i>
                            </button>
                        ';
                    // }
                
                    // Gabungkan semua tombol dalam satu grup
                    return '
                        <div class="btn-group">
                            ' . $editButton . '
                            ' . $deleteButton . '
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('banners.index');
    }

    public function store(bannerRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $data['image'] = uploadDokumen('banner', $request->file('image'));
            }
            // Data sudah tervalidasi melalui PermissionRequest
            $banner = Banner::create($data);
            return response()->json([
                "status" => true,
                "data" => $banner,
                "message" => "Data Banner berhasil ditambahkan"
            ], 201); // HTTP Status 201 untuk created
        } catch (\Exception $e) {
            // Tangkap error yang terjadi
            return response()->json([
                "status" => false,
                "message" => "Terjadi kesalahan saat menyimpan data",
                "error" => $e->getMessage(), // Pesan error untuk debugging
            ], 500); // HTTP Status 500 untuk internal server error
        }
    }

    public function edit(Request $request)
    {
            $banner = Banner::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $banner,
        ]);
    }

    public function update(BannerRequest $request, $id)
    {
        try {
            $banner = Banner::findOrFail($id);
            $data = $request->validated();  
            $data = $request->validated();  
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($banner->image)) {
                   Storage::disk('public')->delete($banner->image);
                }
                $data['image'] = uploadDokumen('banner', $request->file('image'));
            } 

            $banner->update($data); 

            return response()->json([
                "status" => true,
                "data" => $banner,
                "message" => "Data Banner berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Banner tidak ditemukan",
            ], 404); // HTTP Status 404 untuk not found
        } catch (\Exception $e) {
            // Tangkap error lain yang mungkin terjadi
            return response()->json([
                "status" => false,
                "message" => "Terjadi kesalahan saat mengupdate data",
                "error" => $e->getMessage(), // Opsional, untuk debugging
            ], 500); // HTTP Status 500 untuk internal server error
        }
    }
    
    public function destroy(Request $request)
    {
        try {
            $banner = Banner::findOrFail($request->id);
            if (Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
             }
            $banner->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Banner berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Banner tidak ditemukan",
            ], 404); // HTTP Status 404 untuk not found
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => "Terjadi kesalahan saat menghapus data",
                "error" => $e->getMessage(), // Opsional, untuk debugging
            ], 500); // HTTP Status 500 untuk internal server error
        }
    }
}
