<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\TypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantController::class, 'ApiRestaurant']);//

Route::get('/restaurantsTypes', [RestaurantController::class, 'getRestaurantsByTypes']);

Route::get('/dishes', [DishController::class, 'ApiDish']);

Route::get('/types', [TypeController::class, 'ApiType']);

Route::get('/dish/{id}', [DishController::class, 'DishShow']);