<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room = [
            [
                'room_code' => 'RT.01',
                'room_name' => 'Ruangan 101',
                'room_floor' => '5',
                'image' => 'public/images/rt1.png',
            ],
            
        ];
        DB::table('m_room')->insert($room);
    }
}
