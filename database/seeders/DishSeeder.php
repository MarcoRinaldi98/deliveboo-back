<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes_data = config('db.dishes');

        foreach ($dishes_data as $data) {
            $newDish = new Dish();

                $newDish->name = $data["name"];
                $newDish->description = $data["description"];
                $newDish->price = $data["price"];
                $newDish->image = $data["image"];
                $newDish->available = $data["available"];
                $newDish->restaurant_id = $data["restaurant_id"];

            $newDish->save();
        }
    }
}
