<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeritaRequest;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\TagBerita;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class BeritaController extends Controller
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
            $berita = Berita::with('kategoriBerita', 'tagBerita')->orderBy('id', 'desc');
            return datatables($berita)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                
                    // Tambahkan tombol edit jika memiliki izin
                    // if (auth()->user()->can('edit-kategori-dokumen')) {
                        $editButton = '
                            <button onclick="editFunc(`' . $row->slug . '`)" class="btn btn-primary btn-flat btn-sm" title="Edit">
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
                ->editColumn('kategori_berita_id', function ($row) {
                    return $row->kategoriBerita->name;
                })
                ->editColumn('tag_berita_id', function ($row) {
                    return $row->tagBerita->name;
                })
                ->rawColumns(['action', 'kategori_berita_id', 'tag_berita_id'])
                ->make(true);
        }
        $kategoris = KategoriBerita::all();
        $tags = TagBerita::all();
    return view('berita.index', compact('kategoris', 'tags'));
    }

    public function store(beritaRequest $request)
    {
        try {
            // Data sudah tervalidasi melalui PermissionRequest
            $data = $request->validated();
             if ($request->hasFile('image')) {
                 $data['image'] = uploadDokumen('berita', $request->file('image'));
             }
             $data['slug'] = str::slug($request->title); 
            $berita = Berita::create($data);
            return response()->json([
                "status" => true,
                "data" => $berita,
                "message" => "Data Berita Lomba berhasil ditambahkan"
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

    public function show(Request $request, $slug)
    {
        $berita = Berita::where('slug', $request->slug)->first();
        if (!$berita) {
            return response()->json([
                "status" => false,
                "message" => "Data Berita Lomba tidak ditemukan",
            ], 404);
        }
        return response()->json([
            "status" => true,
            "data" => $berita,
        ], 200);
    }
    public function edit(Request $request)
    {
        try {
            // Cari data berita berdasarkan id
            $berita = Berita::findOrFail($request->id);
            if (!$berita) {
                return response()->json([
                    "status" => false,
                    "message" => "Data berita tidak ditemukan.",
                ], 404);
            }
            // Kembalikan respons JSON
            return response()->json([
                "status" => true,
                "data" => $berita,
            ]);
        } catch (ValidationException $e) {
            // Tangani error validasi
            return response()->json([
                "status" => false,
                "message" => "Validasi gagal: " . $e->getMessage(),
                "errors" => $e->errors(),
            ], 422); // Kode status HTTP 422 untuk validasi gagal
        } catch (ModelNotFoundException $e) {
            // Tangani error jika data tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data berita tidak ditemukan.",
            ], 404); // Kode status HTTP 404 untuk data tidak ditemukan
        } catch (Exception $e) {
            // Tangani error umum
            return response()->json([
                "status" => false,
                "message" => "Terjadi kesalahan: " . $e->getMessage(),
            ], 500); // Kode status HTTP 500 untuk internal server error
        }
    }

    public function update(BeritaRequest $request, $slug)
    {
        try {
            $berita = Berita::where('slug', $slug)->first();
            $data = $request->validated();  
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($berita->image)) {
                   Storage::disk('public')->delete($berita->image);
                }
                $data['image'] = uploadDokumen('berita', $request->file('image'));
            }
            $data['slug'] = str::slug($request->title);  
            $berita->update($data); 

            return response()->json([
                "status" => true,
                "data" => $berita,
                "message" => "Data Berita Lomba berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Berita Lomba tidak ditemukan",
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
            $berita = Berita::findOrFail($request->id);
            if (Storage::disk('public')->exists($berita->image)) {
                Storage::disk('public')->delete($berita->image);
             }
            $berita->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Berita Lomba berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Berita Lomba tidak ditemukan",
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
