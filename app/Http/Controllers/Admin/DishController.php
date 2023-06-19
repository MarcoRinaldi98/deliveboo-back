<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Order;
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
        $dishes = Dish::with(['restaurant', 'orders'])->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        $orders = Order::all();
        return view('admin.dishes.create', compact('restaurants', 'orders'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $validated_data = $request->validated();

        $checkDish = Dish::where('id', $validated_data['id'])->first();
        if ($checkDish) {
            return back()->withInput()->withErrors(['id' => 'Cambia il titolo']);
        }

        $newDish = Post::create($validated_data);

        if ($request->has('orders')) {
            $newDish->orders()->attach($request->orders);
        }

        return redirect()->route('admin.dishes.show', ['restaurant' => $newDish->id])->with('status', 'Dish creato con successo!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        $orders = Order::all();
        return view('admin.dishes.create', compact('restaurants', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validated_data = $request->validated();

        $checkDish = Post::where('id', $validated_data['id'])->where('id', '<>', $dish->id)->first();

        if ($checkDish) {
            return back()->withInput()->withErrors(['id' => 'Impossibile creare il titolo']);
        }

        $dish->orders()->sync($request->orders);

        $dish->update($validated_data);


        return redirect()->route('admin.dishes.show', ['dish' => $dish->id])->with('status', 'dish modificato con successo!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}
