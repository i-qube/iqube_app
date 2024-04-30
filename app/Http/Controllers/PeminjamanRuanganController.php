<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuanganModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PeminjamanRuanganController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Peminjaman Ruangan',
            'list' => ['Home', 'peminjaman ruangan']
        ];
        $page = (object) [
            'title' => 'Daftar peminjaman ruangan yang terdata'
        ];
        $activeMenu = 'peminjaman';
        $peminjaman = PeminjamanRuanganModel::all();
        return view('admin.pinjam.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'peminjaman' => $peminjaman, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $peminjamans = PeminjamanRuanganModel::select('peminjaman_ruangan_id','nim', 'nama', 'room_id', 'class', 'date_borrow', 'date_return');

        if ($request->peminjaman_ruangan_id) {
            $peminjamans->where('peminjaman_ruangan_id', $request->peminjaman_ruangan_id);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->addColumn('aksi', function ($peminjaman) {
                $btn = '<a href="' . url('/peminjaman/' . $peminjaman->peminjaman_ruangan_id) . '" class="btn btn-info btn-sm">Not Complete</a> ';
                return $btn;
            })  
            ->rawColumns(['aksi'])
            ->make(true);
        }
}
