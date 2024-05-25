<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanBarangModel;
use App\Models\PeminjamanRuanganModel;
use App\Models\RiwayatModel;
use App\Models\UserModel;
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
        $user = UserModel::all();
        return view('admin.riwayat.index', ['breadcrumb' => $breadcrumb, 'page' => $page,'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function listBarang(Request $request)
    {
        $peminjamans = PeminjamanBarangModel::select('peminjaman_barang_id', 'nim', 'item_id', 'jumlah', 'date_borrow')
        ->with('user');

        if ($request->nim) {
            $peminjamans->where('nim', $request->nim);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->make(true);
    }

    public function  listRuangan(Request $request){
        $peminjamans = PeminjamanRuanganModel::select('peminjaman_ruangan_id', 'nim', 'room_id', 'date_borrow', 'date_return','status')
        ->where('status', 'Complete')->with('user');

        if ($request->peminjaman_ruangan_id) {
            $peminjamans->where('peminjaman_ruangan_id', $request->peminjaman_ruangan_id);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->make(true);
    }

}
