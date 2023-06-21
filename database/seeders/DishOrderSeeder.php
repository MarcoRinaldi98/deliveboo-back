<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('db.orders');
        foreach ($orders as $order) {
            $orderId = $order['id'];
            $dishIds = $order['dish_id'];

            foreach ($dishIds as $dishId) {
                DB::table('dish_order')->insert([
                    'order_id' => $orderId,
                    'dish_id' => $dishId,
                ]);
            }}
    }
}
