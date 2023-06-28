<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class DishController extends Controller
{
    public function ApiDish()
    {

        $dishes = Dish::all();

        return response()->json([
            'success' => true,
            'results' => $dishes,
        ]);
    }

    public function DishShow($restaurant_id)
    {
        $dishes = Dish::where('restaurant_id', $restaurant_id)->get();

        $restaurant = Restaurant::find($restaurant_id);

        return response()->json([
            'success' => true,
            'results' => [
                'dishes' => $dishes,
                'restaurant' => $restaurant
            ]
        ]);
    }
}