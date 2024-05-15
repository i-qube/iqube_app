<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nip' => 1234567,
                'level_id' => 1,
                'nama' => 'Admin Jurusan',
                'password' => Hash::make('1234567'),
            ],
            
        ];
        DB::table('m_admin')->insert($data);
    }
}
