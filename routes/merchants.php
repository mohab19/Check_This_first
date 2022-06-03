<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\MerchantAuthController;
use App\Http\Controllers\MerchantController;

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

Route::group(['middleware' => 'cors', 'json.response'], function () {
    Route::post('register', [MerchantAuthController::class, 'register']);
    Route::post('login', [MerchantAuthController::class, 'login']);

    Route::group(['middleware' => 'auth:merchant-api'], function () {
        Route::get('/dashboard', function() {
            dd(auth()->user()->name);
        });
    });
});
