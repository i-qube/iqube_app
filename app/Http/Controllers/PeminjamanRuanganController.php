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

    // routes/web.php

    public function changeStatus(Request $request)
    {
        $id = $request->input('peminjaman_ruangan_id');
        $peminjaman = PeminjamanRuanganModel::find($id);

        if ($peminjaman) {
            // Update status to 'Complete'
            $peminjaman->status = 'Complete';
            $peminjaman->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}

