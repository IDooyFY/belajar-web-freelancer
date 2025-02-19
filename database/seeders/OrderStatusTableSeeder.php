<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order_status = [
            [
            'name'                => 'Approve',
            'created_at'          => date('Y-m-d h:i:s'),
            'updated_at'          => date('Y-m-d h:i:s'),
            ],
            [
            'name'                => 'Progress',
            'created_at'          => date('Y-m-d h:i:s'),
            'updated_at'          => date('Y-m-d h:i:s'),
            ],
            [
            'name'                => 'Rejected',
            'created_at'          => date('Y-m-d h:i:s'),
            'updated_at'          => date('Y-m-d h:i:s'),
            ],
            [
            'name'                => 'Waiting',
            'created_at'          => date('Y-m-d h:i:s'),
            'updated_at'          => date('Y-m-d h:i:s'),
            ],
        ];

        OrderStatus::insert($order_status);
    }
}
