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
            ->make(true);
        }
}
