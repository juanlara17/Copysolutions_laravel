<?php
use App\Image;
use App\Product;
use App\User;

/***** Load Image *****/
Route::get('/test', function () {

    $product = Product::with('images', 'category')->orderBy('id','desc')->get();
    return $product;
 });


Route::get('/results', function () {
    $user = App\User::find(1);
    return $user->image->url;
});

Route::get('/', function () {

});


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
Route::get('admin', function () {
    return view('admin.admin');
})->name('admin');

/***** Resources Category ******/
Route::resource('admin/category', 'Admin\CategoryController')->names('admin.category');

Route::get('cancel/{route}', function ($route) {
    return redirect()->route($route)->with('cancel',
        'Record cancel');
})->name('cancel');

/***** Resource Product *****/
Route::resource('admin/product', 'Admin\ProductController')->names('admin.product');

/***** Authentication ******/
Auth::routes();

Route::post('/user/create', 'Admin\UserController@store')->name('create.user');

/***** Home Page *****/
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

