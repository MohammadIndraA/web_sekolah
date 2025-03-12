<?php

namespace App\Http\Controllers;

use App\Http\Requests\GambarLombaRequest;
use App\Models\Event;
use App\Models\GambarLomba;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarLombaController extends Controller
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
            $gambarLomba = GambarLomba::orderBy('id', 'desc');
            return datatables($gambarLomba)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                
                    // Tambahkan tombol edit jika memiliki izin
                    // if (auth()->user()->can('edit-kategori-dokumen')) {
                        // $editButton = '
                        //     <button onclick="editFunc(`' . $row->id . '`)" class="btn btn-primary btn-flat btn-sm" title="Edit">
                        //         <i class="dripicons-document-edit"></i>
                        //     </button>
                        // ';
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
        $events = Event::where('status', 'aktif')->get();
        return view('gambar_lomba.index', compact('events'));
    }

    public function store(gambarLombaRequest $request)
    {
        try {
                // Upload multiple images  
        $data = $request->validated();
        $data['event_id'] = $request->event_id;

        $images = uploadMultipleImages($request->file('gambar'), 'lombas', 'lomba');
        foreach ($images as $image) {
           $gambarLomba = GambarLomba::create([
                'event_id' => $request->event_id,
                'gambar' => $image['path'], // Simpan setiap gambar dalam baris terpisah
            ]);
        }
            return response()->json([
                "status" => true,
                "data" => $gambarLomba,
                "message" => "Data Gambar berhasil ditambahkan"
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
            $gambarLomba = GambarLomba::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $gambarLomba,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $gambarLomba = GambarLomba::findOrFail($id);
            $data = $request->all();  
            if ($request->hasFile('gambar')) {
                if (Storage::disk('public')->exists($gambarLomba->gambar)) {
                   Storage::disk('public')->delete($gambarLomba->gambar);
                }
                $data['image'] = uploadDokumen('gambar', $request->file('gambar'));
            } 

            $gambarLomba->update($data); 

            return response()->json([
                "status" => true,
                "data" => $gambarLomba,
                "message" => "Data Gambar berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Gambar tidak ditemukan",
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
            $gambarLomba = GambarLomba::findOrFail($request->id);
            if (Storage::disk('public')->exists($gambarLomba->gambar)) {
                Storage::disk('public')->delete($gambarLomba->gambar);
             }
            $gambarLomba->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Gambar berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Gambar tidak ditemukan",
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
