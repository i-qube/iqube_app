<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PinjamRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'peminjaman_ruangan_id' => 1,
                'nim'=> 12345,
                'nama'=> 'Fadly',
                'room_id'=> 1,
                'class'=>'SIB3A',
                'date_borrow'=> Carbon::now(),
                'date_return'=> Carbon::now(),
            ],
        ];
        DB::table('t_peminjaman_ruangan')->insert($data);
    }
}
