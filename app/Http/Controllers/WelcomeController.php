<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuanganModel;
use App\Models\RuanganModel; // Import the RuanganModel
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
        $selectedWeek = $request->input('week', Carbon::now()->format('Y-\WW'));

        // Convert selected week to start and end dates
        $startOfWeek = Carbon::parse($selectedWeek)->startOfWeek();
        $endOfWeek = Carbon::parse($selectedWeek)->endOfWeek();

        // Retrieve room loan data for the selected week
        $jumlahPinjamRuang = PeminjamanRuanganModel::where('status', 'Complete')
            ->whereBetween('date_borrow', [$startOfWeek, $endOfWeek])
            ->get();

        // Get room names from the room IDs in the loan data
        $roomIds = $jumlahPinjamRuang->pluck('room_id')->unique();
        $rooms = RuanganModel::whereIn('room_id', $roomIds)->get()->keyBy('room_id');

        // Prepare data for the chart
        $labels = [];
        $data = [];

        foreach ($roomIds as $roomId) {
            $roomName = isset($rooms[$roomId]) ? $rooms[$roomId]->room_name : 'Unknown';
            $labels[] = $roomName;
            $data[] = $jumlahPinjamRuang->where('room_id', $roomId)->count();
        }

        return view('admin.welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'selectedWeek' => $selectedWeek,
            'labels' => $labels,
            'jumlahPinjamRuang' => $data,
        ]);
    }
}
