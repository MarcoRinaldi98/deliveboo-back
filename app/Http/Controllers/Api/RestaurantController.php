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
    public function getRestaurantsByTypes(Request $request)
    {
        $typeIds = $request->input('typeIds', []);

        $restaurants = Restaurant::whereHas('types', function ($query) use ($typeIds) {
            foreach ($typeIds as $typeId) {
                $query->where('type_id', $typeId);
            }
        }, '=', count($typeIds))->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}