<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = [
            [
                'item_id' => 1,
                'item_name' => "Charger Baterai AA AAA",
                'brand' => "PALO",
                'item_qty' => 8,
                'date_received' => Carbon::create(2023, 5, 19),
            ],
            [
                'item_id' => 2,
                'item_name' => "Baterai Rechargeable AA 2000mAH",
                'brand' => "Eneloop",
                'item_qty' => 15,
                'date_received' => Carbon::create(2023, 5, 19),
            ],
            [
                'item_id' => 3,
                'item_name' => "Baterai Rechargeable AAA 800mAH",
                'brand' => "Eneloop",
                'item_qty' => 15,
                'date_received' => Carbon::create(2023, 5, 19),
            ],
            [
                'item_id' => 4,
                'item_name' => "Kabel UTP Belden Cat 6",
                'brand' => "Belden",
                'item_qty' => 3,
                'date_received' => Carbon::create(2023, 5, 19),
            ],
            [
                'item_id' => 5,
                'item_name' => "SSD 250GB",
                'brand' => "RX7",
                'item_qty' => 58,
                'date_received' =>  Carbon::create(2023, 5, 22),
            ],
        ];
        DB::table('m_item')->insert($item);
    }
}
