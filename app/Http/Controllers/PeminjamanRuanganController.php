<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuanganModel;
use App\Models\RiwayatModel;
use App\Models\UserModel;
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
        $user = UserModel::all();
        return view('admin.pinjam.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }


    public function list(Request $request)
    {
        $peminjamans = PeminjamanRuanganModel::select('peminjaman_ruangan_id', 'nim', 'room_id', 'date_borrow', 'date_return','status')
        ->with('user');

        if ($request->nim) {
            $peminjamans->where('nim', $request->nim);
        }

        return DataTables::of($peminjamans)
            ->addIndexColumn()
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
