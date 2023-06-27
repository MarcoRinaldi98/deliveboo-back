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
            $query->whereIn('type_id', $typeIds);
        })
            ->whereDoesntHave('types', function ($query) use ($typeIds) {
                $query->whereNotIn('type_id', $typeIds);
            })
            ->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}