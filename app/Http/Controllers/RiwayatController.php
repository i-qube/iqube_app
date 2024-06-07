<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Models\PeminjamanBarangModel;
use App\Models\PeminjamanRuanganModel;
use App\Models\RuanganModel;
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
        $room = RuanganModel::all();
        $item = ItemModel::all();
        return view('admin.riwayat.index', ['breadcrumb' => $breadcrumb, 'page' => $page,'user' => $user, 'room' => $room, 'item' => $item, 'activeMenu' => $activeMenu]);
    }

    public function listBarang(Request $request)
    {
        $peminjamans = PeminjamanBarangModel::select('peminjaman_barang_id', 'no_induk', 'item_id', 'jumlah', 'date_borrow')
        ->with('user', 'item');

        if ($request->no_induk) {
            $peminjamans->where('no_induk', $request->no_induk);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->make(true);
    }

    public function  listRuangan(Request $request){
        $peminjamans = PeminjamanRuanganModel::select('peminjaman_ruangan_id', 'no_induk', 'room_id', 'date_borrow', 'start_time', 'end_time', 'status')
        ->where('status', 'Complete')->with('user', 'room');

        if ($request->peminjaman_ruangan_id) {
            $peminjamans->where('peminjaman_ruangan_id', $request->peminjaman_ruangan_id);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
            ->make(true);
    }
}
