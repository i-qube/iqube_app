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
                'nim' => 2141762026,
                'level_id' => 2,
                'nama' => 'Delinda Candrawati Eka Putri',
                'jurusan' => 'Teknologi Informasi',
                'kelas' => 'SIB-3A',
                'angkatan' => '2021',
                'password' => Hash::make('2141762026'),
            ],
            [
                'nim' => 2141762118,
                'level_id' => 2,
                'nama' => 'Fablo Aimar',
                'jurusan' => 'Teknologi Informasi',
                'kelas' => 'SIB-3A',
                'angkatan' => '2021',
                'password' => Hash::make('2141762118'),
            ],
            [
                'nim' => 2141762110,
                'level_id' => 2,
                'nama' => 'Fadly Ulya Satriadi',
                'jurusan' => 'Teknologi Informasi',
                'kelas' => 'SIB-3A',
                'angkatan' => '2021',
                'password' => Hash::make('2141762110'),
            ],
            [
                'nim' => 2141762139,
                'level_id' => 2,
                'nama' => 'Jati Wahyu Kusuma',
                'jurusan' => 'Teknologi Informasi',
                'kelas' => 'SIB-3A',
                'angkatan' => '2021',
                'password' => Hash::make('2141762139'),
            ],
            [
                'nim' => 2141762050,
                'level_id' => 2,
                'nama' => 'Nadila Amanda Martha Afrhissa',
                'jurusan' => 'Teknologi Informasi',
                'kelas' => 'SIB-3A',
                'angkatan' => '2021',
                'password' => Hash::make('2141762050'),
            ],
            
        ];
        DB::table('m_user')->insert($data);
    }
}
