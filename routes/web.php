<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(ShopController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/item/{id}', 'showPreview')->name('item');
});

Route::controller(OrdersController::class)->group(function () {
    Route::get('/orders', 'index')->name('orders');
    Route::post('/orders/pay', 'pay')->name('orders.pay');
    Route::get('/orders/show/{order}', 'showDetail')->name('orders.show');
});
