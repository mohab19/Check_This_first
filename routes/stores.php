<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\StoreController;

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

Route::group(['middleware' => 'auth:merchant-api', 'cors', 'json.response'], function () {
    Route::get('/stores', [StoreController::class, 'index']);
    Route::get('/stores/{merchant_id}', [StoreController::class, 'stores']);
    Route::get('/store/{store_id}', [StoreController::class, 'show']);
    Route::post('/register', [StoreController::class, 'store']);
});
