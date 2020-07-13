<?php

use App\Product;
use App\SlidePrincipal;
use App\SlideSecondary;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/***** Load Image *****/
/*Route::get('/test', function (Save) {

    $product = Product::with('images', 'category')->orderBy('id','desc')->get();
    return $product;
 });*/

Route::get('/storage', function () {
    return Artisan::call('storage:link');
});

Route::get('cancel/{route}', function ($route) {
    return redirect()->route($route)->with('cancel',
        'Record cancel');
})->name('cancel');

/***** Official Page  *****/
Route::get('/', function () {
    $slider = SlidePrincipal::all();
    $slider_secondary = SlideSecondary::all();
    $products = Product::all();
//    return $slide;
    return view('pages.index', compact('slider','slider_secondary','products'));
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
})->name('admin2');

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
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');

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
/***** Voyager ******/
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/****** File Upload ******/
Route::post('upload-file', 'FileEntryController@uploadFile');
Route::get('create', 'FileEntryController@create');
Route::delete('delete/{id}', 'FileEntryController@destroy');
