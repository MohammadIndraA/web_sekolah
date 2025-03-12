<?php

namespace App\Http\Controllers;

use App\Models\TagBerita;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TagBeritaController extends Controller
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
            $tagBerita = TagBerita::orderBy('id', 'desc');
            return datatables($tagBerita)
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
        return view('tag_berita.index');
    }

    public function store(Request $request)
    {
        try {
            // Data sudah tervalidasi melalui PermissionRequest
            $data = $request->validate([
                'name' => 'required',
            ]);
            $data['slug'] = Str::slug($request->name);
            $tagBerita = TagBerita::create($data);
            return response()->json([
                "status" => true,
                "data" => $tagBerita,
                "message" => "Data Tag Berita berhasil ditambahkan"
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
            $tagBerita = TagBerita::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $tagBerita,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $tagBerita = TagBerita::findOrFail($id);
            $data = $request->validate([
                'name' => 'required',
            ]);
            $data['slug'] = Str::slug($request->name);
            $tagBerita->update($data); 

            return response()->json([
                "status" => true,
                "data" => $tagBerita,
                "message" => "Data Tag Berita berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Tag Berita tidak ditemukan",
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
            $tagBerita = TagBerita::findOrFail($request->id);
            $tagBerita->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Tag Berita berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Tag Berita tidak ditemukan",
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
