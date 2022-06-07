<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Merchants API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors', 'json.response'], function () {
    Route::post('register', [CustomerAuthController::class, 'register']);
    Route::post('login', [CustomerAuthController::class, 'login']);

    Route::group(['middleware' => 'auth:customer-api'], function () {
        Route::get('/dashboard', function() {
            dd(auth()->user('customer-api')->name);
        });
        Route::get('place_order/{cart_id}', [CustomerController::class, 'placeOrder']);
    });
});
