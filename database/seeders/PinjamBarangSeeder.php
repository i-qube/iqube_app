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
                'nim'=> 2141762110,
                'item_id'=> 2,
                'jumlah'=> 12,
                'date_borrow'=> Carbon::now(),
            ],
            [
                'peminjaman_barang_id' => 2,
                'nim'=> 2141762026,
                'item_id'=> 5,
                'jumlah'=> 5,
                'date_borrow'=> Carbon::now(),
            ],
            [
                'peminjaman_barang_id' => 3,
                'nim'=> 2141762139,
                'item_id'=> 1,
                'jumlah'=> 3,
                'date_borrow'=> Carbon::now(),
            ],
            [
                'peminjaman_barang_id' => 4,
                'nim'=> 2141762050,
                'item_id'=> 3,
                'jumlah'=> 8,
                'date_borrow'=> Carbon::now(),
            ],
            [
                'peminjaman_barang_id' => 5,
                'nim'=> 2141762118,
                'item_id'=> 4,
                'jumlah'=> 10,
                'date_borrow'=> Carbon::now(),
            ],
        ];
        DB::table('t_peminjaman_barang')->insert($data);
    }
}
