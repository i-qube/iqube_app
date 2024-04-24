<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBarangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PeminjamanBarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Peminjaman Barang',
            'list' => ['Home', 'peminjaman barang']
        ];
        $page = (object) [
            'title' => ''
        ];
        $activeMenu = 'peminjaman';
        $peminjaman = PeminjamanBarangModel::all();
        return view('admin.pinjam.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'peminjaman' => $peminjaman, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $peminjamans = PeminjamanBarangModel::select('peminjaman_barang_id', 'nim', 'nama', 'item_id', 'class', 'jumlah', 'date_borrow');

        if ($request->peminjaman_barang_id) {
            $peminjamans->where('peminjaman_barang_id', $request->peminjaman_barang_id);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->addColumn('aksi', function ($peminjaman) {
                $btn = '<a href="' . url('/peminjaman/' . $peminjaman->peminjaman_barang_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/peminjaman/' . $peminjaman->peminjaman_barang_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/peminjaman/' . $peminjaman->peminjaman_barang_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
}
