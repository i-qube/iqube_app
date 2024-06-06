<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuanganModel;
use App\Models\RuanganModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserRoomController extends Controller
{
    public function index()
    {
        $rooms = RuanganModel::all();
        return view('user/ruangan/room_user', ['rooms' => $rooms]);
    }

    public function load(Request $request)
    {
        $rooms = RuanganModel::select('room_id', 'room_code', 'room_name', 'image');

        if ($request->room_id) {
            $rooms->where('room_id', $request->room_id);
        }

        return DataTables::of($rooms)
            ->addIndexColumn()
            ->make(true);
    }

    public function form()
    {
        $peminjaman = PeminjamanRuanganModel::all();
        $rooms = RuanganModel::all();

        return view('user.ruangan.room_borrow', ['peminjaman' => $peminjaman, 'rooms' => $rooms]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'date_borrow' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
        ]);

        PeminjamanRuanganModel::create([
            'no_induk' => session('user.no_induk'),
            'room_id' => $request->room_id,
            'date_borrow' => now()->format('Y/m/d H:i:s'),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => $request->status,
        ]);

        return redirect('/room_user')->with('success', 'Data ruangan berhasil disimpan');
    }
}
