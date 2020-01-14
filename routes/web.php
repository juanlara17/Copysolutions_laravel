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

/***** Official Page  *****/
Route::get('/', function () {
    return view('pages.index');
});

/***** Test Page *****/
Route::get('api', function () {
    return view('pages.test');
});

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

