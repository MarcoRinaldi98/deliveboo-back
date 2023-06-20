<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Order;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Dish\StoreDishRequest;
use App\Http\Requests\Dish\UpdateDishRequest;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $dishes = Dish::all();
        return view('admin.dishes.index', compact('dishes', 'restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Dish $dish)
    {
        $restaurants = Restaurant::all();
        return view('admin.dishes.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Restaurant $restaurant)
    {
       
        $data = $request->validate([
            'name'=>'nullable',
            'description'=>'nullable',
            'price'=>'nullable',
            'image'=>'nullable',
            'available'=>'nullable',
            'restaurant_id' => 'exists:restaurants,id',
        ]);
    
        $dish = Dish::create($data);
    
        return redirect()->route('admin.dishes.index', compact('restaurant'))->with('success', 'Piatto aggiunto correttamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish, Restaurant $restaurant)
{
    return view('admin.dishes.edit', compact('dish', 'restaurant'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        
    }
}
