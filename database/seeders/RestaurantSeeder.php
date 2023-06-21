<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant_data = config('db.restaurants');
        $users_id = [1,2,3,4,5,6];

        foreach ($restaurant_data as $data) {
            $newRestaurant = new Restaurant();

                $newRestaurant->vat = $data["vat"];
                $newRestaurant->address = $data["address"];
                $newRestaurant->name = $data["name"];
                $newRestaurant->phone = $data["phone"];
                $newRestaurant->image = $data["image"];
                $newRestaurant->description = $data["description"];
                foreach($users_id as $user_id){
                    $newRestaurant->user_id = $data["user_id"];
                };

            $newRestaurant->save();
        }
    }
}
