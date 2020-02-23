<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Image;

class ProductController extends Controller
{
    public function index()
    {
        /*$cat = new Category();
        $cat->name = 'Niños';
        $cat->slug = 'Niños';
        $cat->description = 'Niños';
        $cat->save();
        return $cat;*/

        return Product::all();
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function show($slug)
    {
        if (Product::where('slug', $slug)->first()) {
            return 'Existing';
        }else{
            return 'Available';
        }
    }

    public function deleteImage($id)
    {
//        return 'Se va a eliminar el registro ' .$id;
        $image = Image::find($id);
        $urlFile = substr($image->url,1);

        $deleteFile = File::delete($urlFile);
        $image->delete();

        return 'eliminado id:'.$id. ' ' .'elimnar';
    }
}
