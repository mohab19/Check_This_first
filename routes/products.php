<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\ProductController;

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
    Route::get('/get_store_products/{store_id}', [ProductController::class, 'index']);
    Route::get('/get_product/{product_id}', [ProductController::class, 'show']);
    Route::post('/register_product', [ProductController::class, 'store']);
});
