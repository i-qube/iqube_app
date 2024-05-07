<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuanganModel;
use App\Models\RiwayatModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PeminjamanRuanganController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Peminjaman',
            'list' => ['Home', 'peminjaman ruangan']
        ];
        $page = (object) [
            'title' => ''
        ];
        $activeMenu = 'peminjaman';
        $peminjaman = PeminjamanRuanganModel::all();
        return view('admin.pinjam.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'peminjaman' => $peminjaman, 'activeMenu' => $activeMenu]);
    }


    public function list(Request $request)
    {
        $peminjamans = PeminjamanRuanganModel::select('peminjaman_ruangan_id', 'nim', 'nama', 'room_id', 'class', 'date_borrow', 'date_return','status');

        if ($request->peminjaman_ruangan_id) {
            $peminjamans->where('peminjaman_ruangan_id', $request->peminjaman_ruangan_id);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
<<<<<<< HEAD
=======
            ->addColumn('aksi', function ($peminjaman) {
                $btn = '<a href="' . url('/peminjaman/' . $peminjaman->peminjaman_ruangan_id) . '" class="btn btn-info btn-sm">Not Complete</a> ';
                return $btn;
            })  
            ->rawColumns(['aksi'])
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
            ->make(true);
    }

    public function changeStatus(Request $request)
    {
        $request->validate([
            'peminjaman_ruangan_id' => 'required|exists:peminjaman_ruangan,peminjaman_ruangan_id',
        ]);

        try {
            $peminjamanRuangan = PeminjamanRuanganModel::findOrFail($request->peminjaman_ruangan_id);
            $peminjamanRuangan->status = 'complete';
            $peminjamanRuangan->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update status.']);
        }
    }
}
