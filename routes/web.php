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

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
use Intervention\Image\ImageManagerStatic;


Route::redirect('/', '/en');

Route::group(['prefix' => '{language}'], function () {
            //products routes
                    Route::get('/',  'ProductController@index' )->name('acceuil');
                    Route::get('/boutique/{slug}',  'ProductController@show' )->name('product.show');
                    Route::get('/search',  'ProductController@search' )->name('product.search');

            

            //Cart routes
            Route::post('/panier/ajouter', 'CartController@store' )->name('cart.store');
            Route::get('/cart', 'CartController@index')->name('cart.index');
            
            Route::delete('panier/{rowid}', 'CartController@destroy')->name('cart.destroy');

            Route::get('/paniervide', function(){
                Cart::destroy();
                return redirect()->route('acceuil');
            });

            //checkout routes
            Route::get('/checkout', 'OrderController@index')->name('order.index')->middleware('auth');
            Route::post('/checkout/ajouter', 'OrderController@store')->name('order.store')->middleware('auth');


            //succes-checkout
            Route::get('/thanks' , "SuccesController@index")->name('success')->middleware('auth');



            //voyager routes
            Route::group(['prefix' => 'admin'], function () {
                Voyager::routes();
            });


            //authentification routes
            Auth::routes();
            Route::get('/home', 'HomeController@index')->name('home');


            //user account routes
            Route::get('/panel', 'PanelController@index')->middleware('auth');


            //wishlist routes
            Route::post('/wishlist/ajouter', 'WishlistController@store')->name('wishlist.store')->middleware('auth');
            Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index')->middleware('auth');
            Route::delete('/wishlist/{rowid}', 'WishlistController@destroy')->name('wishlist.destroy')->middleware('auth');

    });
  //cart update
    Route::patch('/panier/{rowid}', 'CartController@update')->name('cart.update');