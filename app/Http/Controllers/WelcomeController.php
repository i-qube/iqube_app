<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuanganModel;
use App\Models\PeminjamanBarangModel;
use App\Models\RuanganModel;
use App\Models\ItemModel;
use App\Models\UserModel; // Import the User model
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'list' => ['Home', 'Welcome']
        ];
        $activeMenu = 'dashboard';

        // Get selected week from request
        $selectedWeekRuang = $request->input('weekRuang', date('Y-\WW'));
        $selectedWeekBarang = $request->input('weekBarang', date('Y-\WW'));
        $selectedYear = $request->input('year', date('Y'));

        // Convert selected week to start and end dates
        $startOfWeekRuang = Carbon::parse($selectedWeekRuang)->startOfWeek();
        $endOfWeekRuang = Carbon::parse($selectedWeekRuang)->endOfWeek();
        $startOfWeekBarang = Carbon::parse($selectedWeekBarang)->startOfWeek();
        $endOfWeekBarang = Carbon::parse($selectedWeekBarang)->endOfWeek();

        // Retrieve room loan data for the selected week with status 'Complete'
        $jumlahPinjamRuang = PeminjamanRuanganModel::where('status', 'Complete')
            ->whereBetween('date_borrow', [$startOfWeekRuang, $endOfWeekRuang])
            ->get();

        // Retrieve item loan data for the selected week without considering status
        $jumlahPinjamBarang = PeminjamanBarangModel::whereBetween('date_borrow', [$startOfWeekBarang, $endOfWeekBarang])
            ->get();

        // Get room names from the room IDs in the loan data
        $roomIds = $jumlahPinjamRuang->pluck('room_id')->unique();
        $rooms = RuanganModel::whereIn('room_id', $roomIds)->get()->keyBy('room_id');

        // Get item names from the item IDs in the loan data
        $itemIds = $jumlahPinjamBarang->pluck('item_id')->unique();
        $items = ItemModel::whereIn('item_id', $itemIds)->get()->keyBy('item_id');

        // Prepare data for the room chart
        $roomLabels = [];
        $roomData = [];
        foreach ($roomIds as $roomId) {
            $roomName = isset($rooms[$roomId]) ? $rooms[$roomId]->room_name : 'Unknown';
            $roomLabels[] = $roomName;
            $roomData[] = $jumlahPinjamRuang->where('room_id', $roomId)->count();
        }

        // Prepare data for the item chart
        $itemLabels = [];
        $itemData = [];
        foreach ($itemIds as $itemId) {
            $itemName = isset($items[$itemId]) ? $items[$itemId]->item_name : 'Unknown';
            $itemLabels[] = $itemName;
            $itemData[] = $jumlahPinjamBarang->where('item_id', $itemId)->count();
        }

        // Retrieve user data by major (jurusan) and filter by year (angkatan)
        $users = UserModel::whereYear('angkatan', $selectedYear)->get();
        $majors = $users->groupBy('jurusan');

        // Prepare data for the user chart
        $majorLabels = [];
        $majorData = [];
        foreach ($majors as $major => $group) {
            $majorLabels[] = $major;
            $majorData[] = $group->count();
        }

        // Retrieve total items data
        $totalItems = ItemModel::all();
        $itemCountLabels = $totalItems->pluck('item_name');
        $itemCountData = $totalItems->pluck('item_qty');

        return view('admin.welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'selectedWeekRuang' => $selectedWeekRuang,
            'selectedWeekBarang' => $selectedWeekBarang,
            'selectedYear' => $selectedYear,
            'roomLabels' => $roomLabels,
            'roomData' => $roomData,
            'itemLabels' => $itemLabels,
            'itemData' => $itemData,
            'majorLabels' => $majorLabels,
            'majorData' => $majorData,
            'itemCountLabels' => $itemCountLabels,
            'itemCountData' => $itemCountData,
        ]);
    }
}
