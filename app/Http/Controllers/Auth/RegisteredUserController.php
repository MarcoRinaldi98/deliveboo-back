<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'alpha'],
            'surname' => ['required', 'string', 'max:255', 'alpha'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name'=>['required', 'string', 'max:50'],
            'address'=>['required', 'string', 'max:50'],
            'vat'=>['required', 'unique:restaurants,vat', 'string', 'numeric'],
            'phone'=>['required', 'string', 'max:15'],
            'image'=>['nullable','image','mimes:jpg,png,jpeg,gif,svg'],
            'description'=>['nullable','min:10','max:65000'],
            'types[]'=>['exist:types,id']
        ]);
        
        //blocca l'invio dei dati se la validazione non riesce
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $UserID = $user->id;


        $restaurant = Restaurant::create([
            'name'=> $request->input('restaurant_name'),
            'address'=>$request->input('address'),
            'vat'=>$request->input('vat'),
            'phone'=>$request->input('phone'),
            'description'=>$request->input('description'),
            'user_id'=> $UserID,
        ]);

        if($request->hasFile('image')){
            $img_path = Storage::put('cover', $request->image);
            $restaurant->image = $img_path; 
        }

        if ($request->has('types')) {
            $restaurant->types()->attach($request->types);
        }

        $restaurant->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);


    }
}
