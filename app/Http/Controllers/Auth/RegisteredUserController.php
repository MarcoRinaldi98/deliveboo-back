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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $request->validate([
            'restaurant_name'=>['required', 'string', 'max:50'],
            'address'=>['required', 'string', 'max:50'],
            'vat'=>['required', 'unique', 'string', 'max:11'],
            'phone'=>['required', 'string', 'max:15'],
            'image'=>['sometimes','string','image','mimes:jpg,png,jpeg,gif,svg'],
            'description'=>['nullable','min:10','max:65000'],
        ]);

        $restaurant = Restaurant::create([
            'name'=> $request->input('restaurant_name'),
            'address'=>$request->input('address'),
            'vat'=>$request->input('vat'),
            'phone'=>$request->input('phone'),
            'image'=>$request->input('image'),
            'description'=>$request->input('image'),
        ]);

        $restaurant->save();
        // associate

        if ($request->has('types')) {
            $user->types()->attach($request->types);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
