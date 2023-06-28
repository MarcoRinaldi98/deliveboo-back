<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class RestaurantController extends Controller
{
    public function ApiRestaurant()
    {
        Paginator::currentPageResolver(function () {
            return request()->input('page');
        });

        $restaurants = Restaurant::with('types')->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function getRestaurantsByMultipleTypes(Request $request)
    {
        Paginator::currentPageResolver(function () use ($request) {
            return $request->input('page');
        });

        $typeIds = $request->input('typeIds', []);

        $restaurants = Restaurant::with('types');

        foreach ($typeIds as $typeId) {
            $restaurants->whereHas('types', function ($query) use ($typeId) {
                $query->where('type_id', $typeId);
            });
        }

        $restaurants = $restaurants->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}