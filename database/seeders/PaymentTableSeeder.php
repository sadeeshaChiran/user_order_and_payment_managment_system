<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "id" => 1,
                "order_id" => 1,
                "amount" => 1000,
                "payment_method" => 'Online Trancer',
                "payment_date" => now()->format('Y-m-d'),
                "created_at" => now()->format('Y-m-d H:i:s'),
                "updated_at" => now()->format('Y-m-d H:i:s'),


            ],
            [
                "id" => 2,
                "order_id" => 1,
                "amount" => 1000,
                "payment_method" => 'Online Trancer',
                "payment_date" => now()->format('Y-m-d'),
                "created_at" => now()->format('Y-m-d H:i:s'),
                "updated_at" => now()->format('Y-m-d H:i:s'),


            ],
            [
                "id" => 3,
                "order_id" => 1,
                "amount" => 1000,
                "payment_method" => 'Bank deposit',
                "payment_date" => now()->format('Y-m-d'),
                "created_at" => now()->format('Y-m-d H:i:s'),
                "updated_at" => now()->format('Y-m-d H:i:s'),


            ],
            [
                "id" => 4,
                "order_id" => 2,
                "amount" => 2000,
                "payment_method" => 'Online Trancer',
                "payment_date" => now()->format('Y-m-d'),
                "created_at" => now()->format('Y-m-d H:i:s'),
                "updated_at" => now()->format('Y-m-d H:i:s'),


            ],
            [
                "id" => 5,
                "order_id" => 2,
                "amount" => 2000,
                "payment_method" => 'Bank deposit',
                "payment_date" => now()->format('Y-m-d'),
                "created_at" => now()->format('Y-m-d H:i:s'),
                "updated_at" => now()->format('Y-m-d H:i:s'),


            ],
            [
                "id" => 6,
                "order_id" => 3,
                "amount" => 3000,
                "payment_method" => 'Online Trancer',
                "payment_date" => now()->format('Y-m-d'),
                "created_at" => now()->format('Y-m-d H:i:s'),
                "updated_at" => now()->format('Y-m-d H:i:s'),


            ],
        ];
        
        Payment::insert($data);
    }
}
