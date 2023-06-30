<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\DishOrderController;

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

Route::get('/restaurantsTypes', [RestaurantController::class, 'getRestaurantsByMultipleTypes']);

Route::get('/restaurants', [RestaurantController::class, 'ApiRestaurant']);

Route::get('/dishes', [DishController::class, 'ApiDish']);

Route::get('/types', [TypeController::class, 'ApiType']);

Route::get('/menu/{id}', [DishController::class, 'DishShow']);

Route::post('/order', [OrderController::class, 'store']);

Route::post('/dishOrder', [DishOrderController::class, 'store']);