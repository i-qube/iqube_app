<?php

namespace App\Http\Controllers;

use App\Models\RuanganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RuanganController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Ruangan',
            'list' => ['Home', 'ruangan']
        ];
        $page = (object) [
            'title' => 'Daftar ruangan yang terdaftar dalam sistem'
        ];
        $activeMenu = 'ruangan';
        $room = RuanganModel::all();
        return view('admin.ruangan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'room' => $room, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $rooms = RuanganModel::select('room_id', 'room_code', 'room_name', 'room_floor', 'image');

        if ($request->room_id) {
            $rooms->where('room_id', $request->room_id);
        }

        return DataTables::of($rooms)
            ->addIndexColumn()
            ->addColumn('aksi', function ($room) {
                $btn = '<a href="' . url('/ruangan/' . $room->room_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/ruangan/' . $room->room_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/ruangan/' . $room->room_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $room = RuanganModel::all();
        $breadcrumb = (object) [
            'title' => 'Tambah Ruangan',
            'list' => ['Home', 'Ruangan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah ruangan baru'
        ];

        
        $activeMenu = 'ruangan';

        return view('admin.ruangan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'room' => $room, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_code' => 'required|string',
            'room_name' => 'required|string',
            'room_floor' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $image = $request->file('image');
        $fileName = date('Y-m-d'). $image->getClientOriginalName();
        $path = 'ruangan/'.$fileName;

        Storage::disk('public')->put($path, file_get_contents($image));

        RuanganModel::create([
        'room_code' => $request->room_code,
        'room_name' => $request->room_name,
        'room_floor' => $request->room_floor,
        'image' => $fileName
        ]);
        
        return redirect('/ruangan')->with('success', 'Data ruangan berhasil disimpan');
    }

    public function show(string $id)
    {
        $room = RuanganModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Ruangan',
            'list' => ['Home', 'Ruangan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail ruangan'
        ];

        $activeMenu = 'ruangan';

        return view('admin.ruangan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'room' => $room, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $room = RuanganModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Ruangan',
            'list' => ['Home', 'Ruangan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit ruangan'
        ];

        $activeMenu = 'ruangan';

        return view('admin.ruangan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'room' => $room, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'room_code' => 'required|string|unique:m_room,room_code,'.$id.',room_id',
            'room_name' => 'required|string',
            'room_floor' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $image = $request->file('image');
        $fileName = date('Y-m-d'). $image->getClientOriginalName();
        $path = 'ruangan/'.$fileName;

        Storage::disk('public')->put($path, file_get_contents($image));

        RuanganModel::find($id)->update([
            'room_code' => $request->room_code,
            'room_name' => $request->room_name,
            'room_floor' => $request->room_floor,
            'image' => $fileName
            ]);

        return redirect('/ruangan')->with('success', 'Data ruangan berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = RuanganModel::find($id);
        if (!$check) {
            return redirect('/ruangan')->with('error', 'Data ruangan tidak ditemukan');
        }

        try {
            RuanganModel::destroy($id);
            return redirect('/ruangan')->with('success', 'Data ruangan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/ruangan')->with('error', 'Data ruangan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
