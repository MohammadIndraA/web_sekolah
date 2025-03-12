<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurusanRequest;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('permission:view-jurusan', ['only' => ['index','show']]),
            new Middleware('permission:create-jurusan', ['only' => ['create','store']]),
            new Middleware('permission:edit-jurusan', ['only' => ['edit','update']]),
            new Middleware('permission:delete-jurusan', ['only' => ['destroy']]),
        ];
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jurusan = Jurusan::orderBy('id', 'desc');
            return datatables($jurusan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                
                    // Tambahkan tombol edit jika memiliki izin
                    // if (auth()->user()->can('edit-jurusan')) {
                        $editButton = '
                            <button onclick="editFunc(`' . $row->id . '`)" class="btn btn-primary btn-flat btn-sm" title="Edit">
                                <i class="dripicons-document-edit"></i>
                            </button>
                        ';
                    // }
                
                    // Tambahkan tombol delete jika memiliki izin
                    // if (auth()->user()->can('delete-jurusan')) {
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
        return view('jurusan.index');
    }

    public function store(jurusanRequest $request)
    {
        try {
            // Data sudah tervalidasi melalui PermissionRequest
            $jurusan = Jurusan::create($request->validated());
            return response()->json([
                "status" => true,
                "data" => $jurusan,
                "message" => "Data Jurusan berhasil ditambahkan"
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
            $jurusan = Jurusan::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $jurusan,
        ]);
    }

    public function update(JurusanRequest $request, $id)
    {
        try {
            $jurusan = Jurusan::findOrFail($id);
            $data = $request->validated();  

            $jurusan->update($data); 

            return response()->json([
                "status" => true,
                "data" => $jurusan,
                "message" => "Data Jurusan berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Jurusan tidak ditemukan",
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
            $jurusan = Jurusan::findOrFail($request->id);
            $jurusan->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Jurusan berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Jurusan tidak ditemukan",
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
