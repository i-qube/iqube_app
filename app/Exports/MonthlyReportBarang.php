<?php

namespace App\Exports;

use App\Models\PeminjamanBarangModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class MonthlyReportBarang implements FromCollection, WithHeadings, WithMapping
{
    protected $month;
    protected $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function collection()
    {
        return PeminjamanBarangModel::all()->filter(function ($record) {
            $date = \Carbon\Carbon::createFromFormat('d/m/Y', $record->date_borrow);
            return $date->month == $this->month && $date->year == $this->year;
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'No Induk',
            'Item Name',
            'Quantity',
            'Date Borrowed',
        ];
    }

    public function map($record): array
    {
        return [
            $record->peminjaman_barang_id,
            $record->no_induk,
            optional($record->item)->item_name,
            $record->jumlah,
            $record->date_borrow,
        ];
    }
}