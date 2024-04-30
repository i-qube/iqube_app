<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;
use League\Fractal\Resource\Item;
use Yajra\DataTables\Facades\DataTables;

class UserItemController extends Controller
{
    public function index()
    {
        $items = ItemModel::all();
        return view('user/item/item_user', ['items'=>$items]);
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
}