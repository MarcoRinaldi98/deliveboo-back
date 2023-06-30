<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishOrder;

class DishOrderController extends Controller
{
    public function store(Request $request)
    {
        
        $dishOrder = DishOrder::create([
            'order_id'=>3,
            'dish_id'=>3,
            'quantity'=>'2'
        ]);

        $dishOrder->timestamps = false; 

        $dishOrder->save();

        return response()->json([
            'message' => 'Pivot fatta',
            'dishOrder' => $dishOrder,
        ], 201);
    }
}
