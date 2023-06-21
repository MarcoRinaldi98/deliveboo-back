<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DishController;
use Illuminate\Support\Facades\Route;
use App\Models\Restaurants;
use App\Models\Type;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); 
        Route::resource('restaurants', RestaurantController::class)->parameters(['restaurants' => 'restaurant:id']);
        Route::resource('types', TypeController::class)->parameters(['types' => 'type:id']);
        Route::resource('dishes', DishController::class)->parameters(['dishes' => 'dish:id']);
        Route::get('restaurants/{restaurant}/dishes/create', [DishController::class, 'create'])->name('admin.dishes.create');
        Route::post('restaurants/{restaurant}/dishes', [DishController::class ,'store'])->name('admin.dishes.store');
        Route::get('/dishes/{dish}/edit/{restaurant}', [DishController::class, 'edit'])->name('admin.dishes.edit');
        Route::put('/dishes/{dish}/{restaurant}', [DishController::class, 'update'])->name('admin.dishes.update');
        Route::delete('posts/{id}/deleteImage', [DishController::class, 'deleteImage'])->name('dishes.deleteImage');
        Route::delete('restaurants/{id}/deleteImage', [RestaurantController::class, 'deleteImage'])->name('restaurants.deleteImage');
        Route::get('restaurants/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('admin.restaurants.edit');
        Route::put('restaurants/{restaurant}', [RestaurantController::class, 'update'])->name('admin.restaurants.update');
        Route::get('restaurants/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('admin.restaurants.edit');
        Route::resource('orders', OrderController::class)->parameters(['orders' => 'order:id']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';