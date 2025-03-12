<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class KategoriBeritaController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('permission:view-kategori-berita', ['only' => ['index','show']]),
            new Middleware('permission:create-kategori-berita', ['only' => ['create','store']]),
            new Middleware('permission:edit-kategori-berita', ['only' => ['edit','update']]),
            new Middleware('permission:delete-kategori-berita', ['only' => ['destroy']]),
        ];
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategoriBerita = KategoriBerita::orderBy('id', 'desc');
            return datatables($kategoriBerita)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                
                    // Tambahkan tombol edit jika memiliki izin
                    // if (auth()->user()->can('edit-kategori-berita')) {
                        $editButton = '
                            <button onclick="editFunc(`' . $row->id . '`)" class="btn btn-primary btn-flat btn-sm" title="Edit">
                                <i class="dripicons-document-edit"></i>
                            </button>
                        ';
                    // }
                
                    // Tambahkan tombol delete jika memiliki izin
                    // if (auth()->user()->can('delete-kategori-berita')) {
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
        return view('kategori_berita.index');
    }

    public function store(Request $request)
    {
        try {
            // Data sudah tervalidasi melalui PermissionRequest
            $data = $request->validate([
                'name' => 'required',
            ]);
            $data['slug'] = Str::slug($request->name);
            $kategoriBerita = KategoriBerita::create($data);
            return response()->json([
                "status" => true,
                "data" => $kategoriBerita,
                "message" => "Data Kategori Berita berhasil ditambahkan"
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
            $kategoriBerita = KategoriBerita::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $kategoriBerita,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $kategoriBerita = KategoriBerita::findOrFail($id);
            $data = $request->validate([
                'name' => 'required',
            ]);
            $data['slug'] = Str::slug($request->name);
            $kategoriBerita->update($data); 

            return response()->json([
                "status" => true,
                "data" => $kategoriBerita,
                "message" => "Data Kategori Berita berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Kategori Berita tidak ditemukan",
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
            $kategoriBerita = KategoriBerita::findOrFail($request->id);
            $kategoriBerita->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Kategori Berita berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Kategori Berita tidak ditemukan",
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
