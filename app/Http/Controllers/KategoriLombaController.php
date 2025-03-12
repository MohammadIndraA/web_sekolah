<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriLombaRequest;
use App\Models\KategoriLomba;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriLombaController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('permission:view-kategori-lomba', ['only' => ['index','show']]),
            new Middleware('permission:create-kategori-lomba', ['only' => ['create','store']]),
            new Middleware('permission:edit-kategori-lomba', ['only' => ['edit','update']]),
            new Middleware('permission:delete-kategori-lomba', ['only' => ['destroy']]),
        ];
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kategoriLomba = KategoriLomba::orderBy('id', 'desc');
            return datatables($kategoriLomba)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                
                    // Tambahkan tombol edit jika memiliki izin
                    // if (auth()->user()->can('edit-kategori-lomba')) {
                        $editButton = '
                            <button onclick="editFunc(`' . $row->id . '`)" class="btn btn-primary btn-flat btn-sm" title="Edit">
                                <i class="dripicons-document-edit"></i>
                            </button>
                        ';
                    // }
                
                    // Tambahkan tombol delete jika memiliki izin
                    // if (auth()->user()->can('delete-kategori-lomba')) {
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
        return view('kategori_lomba.index');
    }

    public function store(kategoriLombaRequest $request)
    {
        try {
             // Data sudah tervalidasi melalui ManajemenDokumenRequest
             $data = $request->validated();
             if ($request->hasFile('image')) {
                 $data['image'] = uploadDokumen('kategori', $request->file('image'));
             }
            // Data sudah tervalidasi melalui PermissionRequest
            $kategoriLomba = KategoriLomba::create($data);
            return response()->json([
                "status" => true,
                "data" => $kategoriLomba,
                "message" => "Data Kategori Lomba berhasil ditambahkan"
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
            $kategoriLomba = KategoriLomba::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $kategoriLomba,
        ]);
    }

    public function update(KategoriLombaRequest $request, $id)
    {
        try {
            $kategoriLomba = KategoriLomba::findOrFail($id);
            $data = $request->validated();  
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($kategoriLomba->image)) {
                   Storage::disk('public')->delete($kategoriLomba->image);
                }
                $data['image'] = uploadDokumen('kategori', $request->file('image'));
            } 
            $kategoriLomba->update($data); 

            return response()->json([
                "status" => true,
                "data" => $kategoriLomba,
                "message" => "Data Kategori Lomba berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Kategori Lomba tidak ditemukan",
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
            $kategoriLomba = KategoriLomba::findOrFail($request->id);
                if (Storage::disk('public')->exists($kategoriLomba->image)) {
                   Storage::disk('public')->delete($kategoriLomba->image);
                }
            $kategoriLomba->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Kategori Lomba berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Kategori Lomba tidak ditemukan",
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
