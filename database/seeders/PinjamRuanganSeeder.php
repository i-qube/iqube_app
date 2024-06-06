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
                'no_induk'=> 2141762110,
                'room_id'=> 1,
                'date_borrow'=> Carbon::now(),
                'start_time'=>now(),
                'end_time'=>now(),
                'status'=>"Not Complete",
            ],
        ];
        DB::table('t_peminjaman_ruangan')->insert($data);
    }
}