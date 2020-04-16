<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            return 'Existing';
        }else{
            return 'Available';
        }
    }
}
