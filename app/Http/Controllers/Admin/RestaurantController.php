<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Dish;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $form_data = $request->validated();

        if ($request->hasFile('image')) {
            $path = Storage::put('cover', $request->image);
            $data['image'] = $path;
        }
    
        
        $newRestaurant = Restaurant::create($form_data);

        return redirect()->route('admin.restaurants.show', ['restaurant' => $newRestaurant->id])->with('status', 'Restaurant aggiunto con successo');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant,RegisteredUserController $user)
    {
        $restaurants = Restaurant::all();

        if($restaurant->user_id !== auth()->user()->id){
            abort(403, 'Accesso non autorizzato');
        }

        return view('admin.restaurants.show', compact('restaurants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, RegisteredUserController $user)
    {
        if($restaurant->user_id !== auth()->user()->id){
            abort(403, 'Accesso non autorizzato');
        }
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $form_data = $request->validated();

        if ($request->hasFile('image')) {
            if ($restaurant->image) {
                Storage::delete($restaurant->image);
            }
            $path = Storage::put('cover', $request->file('image'));
            $form_data['image'] = $path;
        }

        $restaurant->update($form_data);

        return redirect()->route('admin.restaurants.show', ['restaurant' => $restaurant->id])->with('status', 'Restaurant aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->image) {
            Storage::delete($restaurant->image);
        }

        $restaurant->delete();
        return redirect()->route('admin.restaurants.index');
    }

    public function deleteImage($id) {

        $restaurant = Restaurant::where('id', $id)->firstOrFail();

        if ($restaurant->image) {
            Storage::delete($restaurant->image);
            $restaurant->image = null;
            $restaurant->save();
        }

        return redirect()->route('admin.admin.restaurants.edit', $restaurant->id);

    }
}
