<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_data = config('db.orders');

        foreach ($order_data as $data) {
            $newOrder = new Order();

                $newOrder->guest_name = $data["guest_name"];
                $newOrder->guest_surname = $data["guest_surname"];
                $newOrder->guest_email = $data["guest_email"];
                $newOrder->guest_address = $data["guest_address"];
                $newOrder->guest_phone = $data["guest_phone"];
                $newOrder->amount = $data["amount"];
                $newOrder->status = $data["status"];
                $newOrder->date = $data["date"];
                $newOrder->restaurant_id = $data["restaurant_id"];

            $newOrder->save();
        }
    }
}
