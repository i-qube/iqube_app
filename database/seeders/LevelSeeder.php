<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level = [
            [
                'level_id' => 1,
                'level_code' => 'ADMN',
                'level_name'=> 'Administrator',
            ],
            [
                'level_id' => 2,
                'level_code' => 'USR',
                'level_name'=> 'User',
            ],
        ];
        DB::table('m_level')->insert($level);
    }
}
