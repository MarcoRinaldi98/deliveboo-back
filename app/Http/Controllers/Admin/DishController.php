<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterUserController;
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
            'name' => 'required|string|max:150',
            'description'=>'nullable|max:1000',
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg'], 
            'available' => 'required',
            'restaurant_id' => 'exists:restaurants,id',
        ]);

        if ($request->hasFile('image')) {
            $path = Storage::put('cover', $request->image);
            $data['image'] = $path;
        }
    
        $dish = Dish::create($data);
    
        return redirect()->route('admin.dishes.index', compact('restaurant'))->with('status', 'Piatto aggiunto correttamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish, Restaurant $restaurant)
    {
        if($dish->restaurant_id !== auth()->user()->id){
            abort(403, 'Accesso non autorizzato');
        }

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
        $restaurants = Restaurant::all();

        if($dish->restaurant_id !== auth()->user()->id){
            abort(403, 'Accesso non autorizzato');
        }
        
        return view('admin.dishes.edit', compact('dish', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish, Restaurant $restaurant)
    {
        $data = $request->validate([
            'name'=>'required|string|max:150',
            'description'=>'nullable|max:1000',
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'available'=>'required',
        ]);

        if ($request->hasFile('image')) {

            if ($dish->image) {
                Storage::delete($dish->image);
            }

            $path = Storage::put('cover', $request->image);
            $data['image'] = $path;

        }

        $dish->update($data);

        return redirect()->route('admin.dishes.index', compact('restaurant', 'dish'))->with('status', 'Piatto Aggiornato correttamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if ($dish->image) {
            Storage::delete($dish->image);
        }

        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }

    public function deleteImage($id) {

        $dish = Dish::where('id', $id)->firstOrFail();

        if ($dish->image) {
            Storage::delete($dish->image);
            $dish->image = null;
            $dish->save();
        }

        return redirect()->route('admin.dishes.edit', $dish->id);

    }
}
