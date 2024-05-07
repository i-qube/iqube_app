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
<<<<<<< HEAD
                'nim'=> 123456,
                'nama'=> 'Delinda',
                'item_id'=> 5,
                'class'=>'SIB3A',
                'jumlah'=> 5,
                'date_borrow'=> Carbon::now(),
            ],
            [
                'peminjaman_barang_id' => 3,
                'nim'=> 123457,
                'nama'=> 'Jati',
                'item_id'=> 1,
                'class'=>'SIB3A',
                'jumlah'=> 3,
                'date_borrow'=> Carbon::now(),
            ],
            [
                'peminjaman_barang_id' => 4,
                'nim'=> 123458,
                'nama'=> 'Nadila',
                'item_id'=> 3,
                'class'=>'SIB3A',
                'jumlah'=> 8,
                'date_borrow'=> Carbon::now(),
            ],
            [
                'peminjaman_barang_id' => 5,
                'nim'=> 123459,
                'nama'=> 'Fablo',
                'item_id'=> 4,
                'class'=>'SIB3A',
=======
                'nim'=> 2141762139,
                'nama'=> 'Jati',
                'item_id'=> 3,
                'class'=>'SIB3A',
>>>>>>> c4804f7fdaa33e2465a338bef53cd0f79b9eee37
                'jumlah'=> 10,
                'date_borrow'=> Carbon::now(),
            ],
        ];
        DB::table('t_peminjaman_barang')->insert($data);
    }
}
