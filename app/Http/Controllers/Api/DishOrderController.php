<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishOrder;

class DishOrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required',
            'dish_id' => 'required', 
            'quantity' => 'required', 
        ]);

        $dishOrder = DishOrder::create([
            'order_id' => 7,
            'dish_id' => $validatedData['dish_id'],
            'quantity' => $validatedData['quantity'],
        ]);

        return response()->json([
            'message' => 'Pivot creata con successo',
            'dishOrder' => $dishOrder,
        ], 201);
    }
}
