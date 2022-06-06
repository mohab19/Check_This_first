<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Customers API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:customer-api', 'cors', 'json.response'], function () {
    Route::get('/get_cart', [CartController::class, 'index']);
    Route::post('/add_product', [CartController::class, 'store']);
    Route::get('/remove_product/{product_id}', [CartController::class, 'delete']);
    Route::post('/place_order', [CartController::class, 'placeOrder']);
});
