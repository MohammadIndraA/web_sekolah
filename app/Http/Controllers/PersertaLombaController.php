<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesertaLombaRequest;
use App\Models\DaftarSekolah;
use App\Models\KategoriLomba;
use App\Models\PersertaLomba;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PersertaLombaController extends Controller
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
            $pesertaLomba = PersertaLomba::with('daftarSekolah', 'kategoriLomba')->orderBy('id', 'desc');
            return datatables($pesertaLomba)
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
                ->editColumn('daftar_sekolah_id', function ($row) {
                    return $row->daftarSekolah->name;
                })
                ->editColumn('kategori_lomba_id', function ($row) {
                    return $row->kategoriLomba->name;
                })
                ->rawColumns(['action', 'daftar_sekolah_id', 'kategori_lomba_id'])
                ->make(true);
        }
        $daftarSekolah = DaftarSekolah::all();
        $daftarKategori = KategoriLomba::all();
        return view('daftar_peserta.index', compact('daftarSekolah', 'daftarKategori'));
    }

    public function store(pesertaLombaRequest $request)
    {
        try {
            // Data sudah tervalidasi melalui PermissionRequest
            $pesertaLomba = PersertaLomba::create($request->validated());
            return response()->json([
                "status" => true,
                "data" => $pesertaLomba,
                "message" => "Data Daftar Peserta Lomba berhasil ditambahkan"
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
            $pesertaLomba = PersertaLomba::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $pesertaLomba,
        ]);
    }

    public function update(PesertaLombaRequest $request, $id)
    {
        try {
            $pesertaLomba = PersertaLomba::findOrFail($id);
            $data = $request->validated();  

            $pesertaLomba->update($data); 

            return response()->json([
                "status" => true,
                "data" => $pesertaLomba,
                "message" => "Data Daftar Peserta Lomba berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Daftar Peserta Lomba tidak ditemukan",
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
            $pesertaLomba = PersertaLomba::findOrFail($request->id);
            $pesertaLomba->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Daftar Peserta Lomba berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Daftar Peserta Lomba tidak ditemukan",
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
