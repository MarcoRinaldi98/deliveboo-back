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
    
        $restaurant = Restaurant::create($form_data);

        if ($request->has('types')) {
            $restaurant->types()->attach($request->types);
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
    public function edit(Restaurant $restaurant, RegisteredUserController $user, Type $types)
    {
        if ($restaurant->user_id !== auth()->user()->id) {
            abort(403, 'Accesso non autorizzato');
        }
    
        $types = Type::all();
    
        // Recupera i tipi già selezionati per il ristorante
        $selectedTypes = $restaurant->types()->pluck('types.id')->toArray();

    
        return view('admin.restaurants.edit', compact('restaurant', 'types', 'selectedTypes'));
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

            $request->validate([
            'name' => ['required', 'string', 'max:255', 'alpha'],
            'surname' => ['required', 'string', 'max:255', 'alpha'],
            'address' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:15'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'vat'=>['required', 'max:11', 'min:11'],
            'description' => ['nullable', 'min:10', 'max:65000'],
            'types.*' => ['exists:types,id'],
        ]);     
        
        $form_data = $request->validated();
        //blocca l'invio dei dati se la validazione non riesce
        if ($form_data->fails()) {
            return redirect()->back()->withErrors($form_data)->withInput();
        }

        if ($request->hasFile('image')) {
            if ($restaurant->image) {
                Storage::delete($restaurant->image);
            }
            $path = Storage::put('cover', $request->file('image'));
            $form_data['image'] = $path;
        }

        if($restaurant->vat !== $request->vat){    
            $validator = Validator::make($request->all(), [
                'vat'=>['required', 'unique:restaurants,vat', 'string', 'numeric'],
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'vat'=>['required', 'string', 'numeric'],
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $restaurant->types()->sync($request->types);

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
