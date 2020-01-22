<?php
use App\Image;

/***** Load Image *****/
Route::get('/test', function () {

    $user = App\User::find(1);
    $image = $user->image;
    if ($image) {
        echo 'Have a image';
    }else{
        echo 'Dont have a image';
    }
    return $image;
 });


Route::get('/results', function () {

    $image = Image::orderBy('id', 'Desc')->get();
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
Route::get('catalog', function () {
    return view('pages.portfolio.portfolio');
})->name('catalog');

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

/***** Home Page *****/
Route::get('/home', 'HomeController@index')->name('home');

