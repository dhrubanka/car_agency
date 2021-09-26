<?php

use Illuminate\Support\Facades\Route;

use Spatie\Permission\Traits\HasRoles;
use \App\Car;
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

Route::get('/', function () {
    $cars = Car::all();
    return view('welcome',['cars'=>$cars]);
});

 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => ['role:agency']], function () {
        Route::get('/mycars',   'CarController@index')->name('mycars');
        Route::get('/mycars/create',   'CarController@create')->name('mycars-create');
        Route::get('/mycars/show/{id}',   'CarController@show')->name('mycars-show');
        Route::get('/mycars/edit/{id}',   'CarController@edit')->name('mycars-edit');
        Route::get('/mycars/delete/{id}',   'CarController@destroy');
        Route::post('/mycars/store',   'CarController@store')->name('mycars-store');

        Route::get('/orders',   'OrderController@index')->name('orders');
        Route::get('/orders/show/{id}',   'OrderController@show')->name('orders-show');
    });

    Route::group(['middleware' => ['role:user']], function () {

        Route::post('/order/store',   'OrderController@store')->name('order-store');
    });
});
