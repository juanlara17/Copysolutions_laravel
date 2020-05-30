<?php

use App\Image;
use App\Product;
use App\User;

/***** Load Image *****/
/*Route::get('/test', function (Save) {

    $product = Product::with('images', 'category')->orderBy('id','desc')->get();
    return $product;
 });*/

Route::get('cancel/{route}', function ($route) {
    return redirect()->route($route)->with('cancel',
        'Record cancel');
})->name('cancel');

/***** Official Page  *****/
Route::get('/', function () {
    return view('pages.index');
})->name('index');

/***** Contact *****/
Route::get('contact', function () {
    return view('pages.contact');
})->name('contact');

/***** Portfolio *****/
Route::get('portfolio', function () {
    return view('pages.portfolio.portfolio');
})->name('portfolio');


/***** Panel Admin *****/
Route::get('admin2/', function () {
    return view('admin.pages.dashboard');
})->name('admin');

/***** Resources Category ******/
Route::resource('admin/category', 'Admin\CategoryController')->names('admin.category');

/***** Resource Product *****/
Route::resource('admin/product', 'Admin\ProductController')->names('admin.product');

/***** Store ********/
Route::resource('store', 'StoreController')->names('store');

/***** Cart ******/
Route::post('cart/saveOrderForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.saveOrderForLater');
Route::resource('/cart', 'CartController')->names('cart');

/***** SaveForLater ******/
Route::delete('saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('saveForLater/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

/***** Checkout ******/
Route::resource('checkout', 'CheckoutController')->names('checkout');

/***** Confirmation *******/
Route::resource('confirmation', 'ConfirmationController')->names('confirmation');

/***** Authentication ******/
Auth::routes();

Route::post('/user/create', 'Admin\UserController@store')->name('create.user');

/***** Home Page *****/
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('empty', function (){
    \Cart::session('saveForLater')->clear();
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
