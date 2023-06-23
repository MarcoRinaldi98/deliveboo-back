<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

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
        $dish = Dish::where('restaurant_id', $restaurant_id)->get();

        return response()->json([
            'success' => true,
            'results' => $dish
        ]);
    }
}