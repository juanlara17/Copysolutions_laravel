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
        $categories = Category::all();
        if (request()->category) {
            $products = Product::with('category')->whereHas('category', function ($query){
                $query->where('slug', request()->category);
            });
            $categories = Category::all();
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            $products = $products->paginate(9);
        }else{
           $products = Product::take(12)->paginate(6);
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
        $product = Product::with('images','category')->where('slug', $slug)->firstOrFail();
//        return $product;
        $stockLevel = getStockLevel($product->quantity);
//        return (json_decode($product->images, true));
//        return $product;
        return view('store.show')->with([
            'product' => $product,
            'stockLevel' => $stockLevel
        ]);
    }
}
