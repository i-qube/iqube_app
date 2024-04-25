<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PinjamBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'peminjaman_barang_id' => 1,
                'nim'=> 12345,
                'nama'=> 'Fadly',
                'item_id'=> 2,
                'class'=>'SIB3A',
                'jumlah'=> 12,
                'date_borrow'=> Carbon::now(),
            ],
            [
                'peminjaman_barang_id' => 2,
                'nim'=> 2141762139,
                'nama'=> 'Jati',
                'item_id'=> 3,
                'class'=>'SIB3A',
                'jumlah'=> 10,
                'date_borrow'=> Carbon::now(),
            ],
        ];
        DB::table('t_peminjaman_barang')->insert($data);
    }
}
