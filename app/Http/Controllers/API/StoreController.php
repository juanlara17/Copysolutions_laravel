<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        if (request()->category) {
            $products = Product::with('category')->whereHas('category', function ($query){
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
//            return $products;
        }else{
           $products = Product::inRandomOrder()->take(12)->get();
           $categories = Category::all();
           $categoryName = 'Featured';
        }

        return view('store.index')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName
        ]);
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function show($slug)
    {

    }
}
