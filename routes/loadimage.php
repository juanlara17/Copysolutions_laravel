<?php
use App\Image;

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
    return $image;
});


Route::get('/', function () {

});
