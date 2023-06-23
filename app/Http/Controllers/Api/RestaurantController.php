<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function ApiRestaurant()
    {
        $restaurants = Restaurant::with('types')->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
    public function getRestaurantsByType($type_id)
    {
        $restaurants = Restaurant::whereHas('types', function ($query) use ($type_id) {
            $query->where('type_id', $type_id);
        })->get();

        return response()->json($restaurants);
    }
}