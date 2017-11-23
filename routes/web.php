<?php

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

use App\Categorie;
use App\Product;

Route::get('/', 'HomeController@index');

Route::get('pagina/{slug}', 'PagesController@show');
Route::get('produto/{slug}', 'ProductsController@show');
Route::get('categoria/{slug}', 'CategoriesController@show');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

//Carrinho de compra
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@add')->name('cart.add');
Route::get('/cart/details','CartController@details')->name('cart.details');
Route::post('/cart/{id}','CartController@delete')->name('cart.delete');

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
