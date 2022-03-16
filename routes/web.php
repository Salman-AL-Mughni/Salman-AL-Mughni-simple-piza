<?php

use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontpage');
Route::get('/pizzas/{id}', [App\Http\Controllers\FrontendController::class, 'show'])->name('pizzas.show');
Route::post('/order/store', [App\Http\Controllers\FrontendController::class, 'store'])->name('pizzas.store');
Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function (){
    Route::resource('pizza', PizzaController::class);
    Route::resource('user/order', UserOrderController::class);
    Route::post('order/{id}/status','App\Http\Controllers\UserOrderController@changeStatus')->name('order.status');
    Route::get('/customers','App\Http\Controllers\UserOrderController@customers')->name('customers');
});
