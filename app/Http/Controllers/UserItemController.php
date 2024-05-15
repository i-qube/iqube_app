<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Models\PeminjamanBarangModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserItemController extends Controller
{
    public function index()
    {
        $items = ItemModel::all();
        return view('user/item/item_user', ['items' => $items]);
    }

    public function load(Request $request)
    {
        $items = ItemModel::select('item_id', 'item_name');

        if ($request->item_id) {
            $items->where('item_id', $request->item_id);
        }

        return DataTables::of($items)
            ->addIndexColumn()
            ->make(true);
    }

    public function form()
    {
        $peminjaman = PeminjamanBarangModel::all();

        return view('user.item.item_borrow', ['peminjaman' => $peminjaman]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'item_id' => 'required|integer',
            'jumlah' => 'required|integer',
            'date_borrow' => 'required|date'
        ]);
        $nim = session('user.nim');
        $now = Carbon::now();
        $date_borrow = $now->format('Y/m/d H:i:s');

        PeminjamanBarangModel::create([
            'nim' => $nim,
            'item_id' => $request->item_id,
            'jumlah' => $request->jumlah,
            'date_borrow' => $date_borrow
        ]);

        return redirect('/item_user')->with('success', 'Data barang berhasil disimpan');
    }
}
