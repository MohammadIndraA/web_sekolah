<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public static function middleware()
    {
        return [
            new Middleware('permission:view-event-lomba', ['only' => ['index','show']]),
            new Middleware('permission:create-event-lomba', ['only' => ['create','store']]),
            new Middleware('permission:edit-event-lomba', ['only' => ['edit','update']]),
            new Middleware('permission:delete-event-lomba', ['only' => ['destroy']]),
        ];
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $event = Event::orderBy('id', 'desc');
            return datatables($event)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                
                    // Tambahkan tombol edit jika memiliki izin
                    // if (auth()->user()->can('edit-event-lomba')) {
                        $editButton = '
                            <button onclick="editFunc(`' . $row->id . '`)" class="btn btn-primary btn-flat btn-sm" title="Edit">
                                <i class="dripicons-document-edit"></i>
                            </button>
                        ';
                    // }
                
                    // Tambahkan tombol delete jika memiliki izin
                    // if (auth()->user()->can('delete-event-lomba')) {
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
        return view('events.index');
    }

    public function store(eventRequest $request)
    {
        try {
             // Data sudah tervalidasi melalui ManajemenDokumenRequest
             $data = $request->validated();
             if ($request->hasFile('image')) {
                 $data['image'] = uploadDokumen('event', $request->file('image'));
             }
            // Data sudah tervalidasi melalui PermissionRequest
            $event = Event::create($data);
            return response()->json([
                "status" => true,
                "data" => $event,
                "message" => "Data Event berhasil ditambahkan"
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
            $event = Event::findOrFail($request->id);
        return response()->json([
            "status" => true,
            "data" => $event,
        ]);
    }

    public function update(eventRequest $request, $id)
    {
        try {
            $event = Event::findOrFail($id);
            $data = $request->validated();  
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($event->image)) {
                   Storage::disk('public')->delete($event->image);
                }
                $data['image'] = uploadDokumen('event', $request->file('image'));
            } 
            $event->update($data); 

            return response()->json([
                "status" => true,
                "data" => $event,
                "message" => "Data Event berhasil diupdate"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            // Jika user dengan ID tersebut tidak ditemukan
            return response()->json([
                "status" => false,
                "message" => "Data Event tidak ditemukan",
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
            $event = Event::findOrFail($request->id);
                if (Storage::disk('public')->exists($event->image)) {
                   Storage::disk('public')->delete($event->image);
                }
            $event->delete();
            return response()->json([
                "status" => true,
                "message" => "Data Event berhasil dihapus"
            ], 200); // HTTP Status 200 untuk sukses
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "status" => false,
                "message" => "Data Event tidak ditemukan",
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
