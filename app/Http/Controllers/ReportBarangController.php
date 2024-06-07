<?php

namespace App\Http\Controllers;

use App\Exports\MonthlyReportBarang;
use App\Exports\MonthlyReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReportBarangController extends Controller
{
    public function export(Request $request)
    {
        $month = $request->input('month', now()-> month);
        $year = $request->input('year', now()-> year);
        return Excel::download(new MonthlyReportBarang($month, $year), 'monthly_report_barang.xlsx');
    }
}