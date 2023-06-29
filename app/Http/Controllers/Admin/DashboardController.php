<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $restaurants = Restaurant::all();
        return view('admin.restaurants.show', compact('restaurants', 'user'));
    }
}
