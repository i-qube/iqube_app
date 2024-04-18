<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Fractal\Resource\Item;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang']
        ];
        $page = (object) [
            'title' => 'Daftar barang yang terdaftar dalam sistem'
        ];
        $activeMenu = 'item';
        $item = ItemModel::all();
        return view('admin.barang.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'item' => $item, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $items = ItemModel::select('item_id', 'item_name', 'brand', 'item_qty', 'date_received');

        if ($request->item_id) {
            $items->where('item_id', $request->item_id);
        }

        return DataTables::of($items)
            ->addIndexColumn()
            ->addColumn('aksi', function ($item) {
                $btn = '<a href="' . url('/barang/' . $item->item_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/barang/' . $item->item_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/barang/' . $item->item_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah barang baru'
        ];

        $item = ItemModel::all();
        $activeMenu = 'item';

        return view('admin.barang.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'item' => $item, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string',
            'brand' => 'required|string',
            'item_qty' => 'required|integer',
            'date_received' => 'required|date'
        ]);

        ItemModel::create([
            'item_name' => $request->item_name,
            'brand' => $request->brand,
            'item_qty' => $request->item_qty,
            'date_received' => $request->date_received
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }

    public function show(string $id)
    {
        $item = ItemModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail barang'
        ];

        $activeMenu = 'item';

        return view('admin.barang.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'item' => $item, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $item = ItemModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list'=> ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit barang'
        ];

        $activeMenu = 'item';

        return view('admin.barang.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'item' => $item, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_name' => 'required|string',
            'brand' => 'required|string',
            'item_qty' => 'required|integer',
            'date_received' => 'required|date'
        ]);

        ItemModel::find($id)->update([
            'item_name' => $request->item_name,
            'brand' => $request->brand,
            'item_qty' => $request->item_qty,
            'date_received' => $request->date_received
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = ItemModel::find($id);
        if(!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        try{
            ItemModel::destroy($id);
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
