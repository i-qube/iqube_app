<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBarangModel;
use App\Models\PeminjamanRuanganModel;
use App\Models\RiwayatModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Riwayat',
            'list' => ['Home', 'riwayat peminjaman']
        ];
        $page = (object) [
            'title' => ''
        ];
        $activeMenu = 'riwayat';
        $riwayat = RiwayatModel::all();
        return view('admin.riwayat.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'riwayat' => $riwayat, 'activeMenu' => $activeMenu]);
    }

    public function listBarang(Request $request)
    {
        $peminjamans = PeminjamanBarangModel::select('peminjaman_barang_id', 'nim', 'nama', 'item_id', 'class', 'jumlah', 'date_borrow');

        if ($request->peminjaman_barang_id) {
            $peminjamans->where('peminjaman_barang_id', $request->peminjaman_barang_id);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->make(true);
    }

    public function  listRuangan(Request $request){
        $peminjamans = PeminjamanRuanganModel::select('peminjaman_ruangan_id', 'nim', 'nama', 'room_id', 'class', 'date_borrow', 'date_return','status')
        ->where('status', 'Complete');

        if ($request->peminjaman_ruangan_id) {
            $peminjamans->where('peminjaman_ruangan_id', $request->peminjaman_ruangan_id);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->make(true);
    }

}
