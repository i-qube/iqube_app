<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        $items = ItemModel::select('item_id', 'item_name', 'brand', 'item_qty', 'date_received', 'image');

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
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|string',
            'brand' => 'required|string',
            'item_qty' => 'required|integer',
            'date_received' => 'required|date',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $image = $request->file('image');
        $fileName = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'barang/' . $fileName;

        Storage::disk('public')->put($path, file_get_contents($image));

        ItemModel::create([
            'item_name' => $request->item_name,
            'brand' => $request->brand,
            'item_qty' => $request->item_qty,
            'date_received' => $request->date_received,
            'image' => $fileName
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
            'list' => ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit barang'
        ];

        $activeMenu = 'item';

        return view('admin.barang.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'item' => $item, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|string',
            'brand' => 'required|string',
            'item_qty' => 'required|integer',
            'date_received' => 'required|date',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $item = ItemModel::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('Y-m-d') . '-' . $image->getClientOriginalName();
            $path = 'barang/' . $fileName;
            // Store the new image
            Storage::disk('public')->put($path, file_get_contents($image));
            // Delete the old image if a new one is uploaded
            if ($item->image) {
                Storage::disk('public')->delete('barang/' . $item->image);
            }
            // Update with the new image
            $item->image = $fileName;
        }

        $item->item_name = $request->item_name;
        $item->brand = $request->brand;
        $item->item_qty = $request->item_qty;
        $item->date_received = $request->date_received;
        $item->save();

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }


    public function destroy(string $id)
    {
        $check = ItemModel::find($id);
        if (!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            ItemModel::destroy($id);
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
