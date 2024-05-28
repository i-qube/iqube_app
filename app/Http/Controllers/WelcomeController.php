<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel; // Pastikan Anda mengimpor model Barang

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => ['Home', 'Welcome']
        ];
        $activeMenu = 'dashboard';

        // Ambil jumlah barang dari database
        $jumlahBarang = ItemModel::count();

        return view('admin.welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'jumlahBarang' => $jumlahBarang // Kirim variabel ke view
        ]);
    }
}