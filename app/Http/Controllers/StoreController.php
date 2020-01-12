<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        /*$cat = new Category();
        $cat->name = 'Niños';
        $cat->slug = 'Niños';
        $cat->description = 'Niños';
        $cat->save();
        return $cat;*/

        return Category::all();
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function show($slug)
    {
        if (Category::where('slug', $slug)->first()) {
            return 'Slug existente';
        }else{
            return 'Slug disponible';
        }
    }
}
