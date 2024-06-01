<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Models\PeminjamanBarangModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PeminjamanBarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Peminjaman',
            'list' => ['Home', 'peminjaman barang']
        ];
        $page = (object) [
            'title' => ''
        ];
        $activeMenu = 'peminjaman';
        $user = UserModel::all();
        $item = ItemModel::all();
        return view('admin.pinjam.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'item' => $item, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {

        $peminjamans = PeminjamanBarangModel::select('peminjaman_barang_id', 'nim', 'item_id', 'jumlah', 'date_borrow')
        ->with('user', 'item');

        if ($request->nim) {
            $peminjamans->where('nim', $request->nim);
        }
        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->make(true);
    }
}
