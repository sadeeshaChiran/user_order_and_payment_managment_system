<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id" => 1,
                "user_id" => 1
            ],
            [
                "id" => 2,
                "user_id" => 1

            ],
            [
                "id" => 3,
                "user_id" => 2

            ],

        ];
        
        Order::insert($data);
    }
}
