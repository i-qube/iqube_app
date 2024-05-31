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
        // Retrieve nim from session
        $nim = session('user.nim');

        // Fetch peminjamans data filtered by nim
        $peminjamans = PeminjamanBarangModel::where('nim', $nim)->get();

        // Pass the data to the view
        return view('user.peminjaman.peminjaman', compact('peminjamans'));
    }
}
