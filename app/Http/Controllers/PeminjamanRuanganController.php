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
                $btn = '<a href="' . url('/peminjaman/' . $peminjaman->peminjaman_ruangan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/peminjaman/' . $peminjaman->peminjaman_ruangan_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/peminjaman/' . $peminjaman->peminjaman_ruangan_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
}
