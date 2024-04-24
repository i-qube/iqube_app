<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PinjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level = [
            [
                'admin_id' => 1,
                'user_id' => 'ADMN',
                'item_id'=> 'Administrator',
                'user_name'=> '',
                'class'=>'babayo',
                'jumlah'=> 12,
                'date_borrow'=>''
            ],
            [
                'level_id' => 2,
                'level_code' => 'USR',
                'level_name'=> 'User',
            ],
        ];
        DB::table('t_peminjaman_barang')->insert($level);
    }
}
