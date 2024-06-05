<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Models\PeminjamanBarangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserBorrowController extends Controller
{
    public function index(Request $request)
    {
        $item = ItemModel::all();
        // Retrieve no_induk from session
        $no_induk = session('user.no_induk');

        // Fetch peminjamans data filtered by no_induk
        $peminjamans = PeminjamanBarangModel::where('no_induk', $no_induk)->get();

        // Pass the data to the view
        return view('user.peminjaman.peminjaman', compact('peminjamans'));
    }
}
