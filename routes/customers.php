<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    Route::post('register', [CustomerController::class, 'register']);
    Route::post('login', [CustomerController::class, 'login']);

    Route::group(['middleware' => 'auth:customer-api'], function () {
        Route::get('/dashboard', function() {
            dd(auth()->user()->name);
        });
    });
});
