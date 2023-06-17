<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $restaurants = config('db.restaurants');
        foreach ($restaurants as $restaurant) {
            $restaurantId = $restaurant['id'];
            $typeIds = $restaurant['type_id'];

            foreach ($typeIds as $typeId) {
                DB::table('restaurant_type')->insert([
                    'restaurant_id' => $restaurantId,
                    'type_id' => $typeId,
                ]);
            }}
    }
}
