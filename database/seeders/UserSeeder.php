<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nim' => 12345,
                'level_id' => 2,
                'password' => Hash::make('12345'),
            ],
            [
                'nim' => 123456,
                'level_id' => 2,
                'password' => Hash::make('123456'),
            ],
            [
                'nim' => 123457,
                'level_id' => 2,
                'password' => Hash::make('123457'),
            ],
            [
                'nim' => 123458,
                'level_id' => 2,
                'password' => Hash::make('123458'),
            ],
            [
                'nim' => 123459,
                'level_id' => 2,
                'password' => Hash::make('123459'),
            ],
            
        ];
        DB::table('m_user')->insert($data);
    }
}
