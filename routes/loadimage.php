<?php
use App\Image;

Route::get('/test', function () {
    return 'Prueba';
});


Route::get('/results', function () {

    $image = Image::orderBy('id', 'Desc')->get();
    return $image;
});


Route::get('/', function () {

});
