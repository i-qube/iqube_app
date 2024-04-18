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
        $user = [
            [
                'user_id' => 1,
                'nim' => 12345,
                'level_id' => 2,
                'password' => Hash::make('12345'),
            ],
            
        ];
        DB::table('users')->insert($user);
    }
}
