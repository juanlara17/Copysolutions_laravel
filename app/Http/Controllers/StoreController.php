<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        if (request()->category) {
//            dd(Product::with('category'));
            $products = Product::with('category')->where('visible',true)->whereHas('category', function ($query){
                $query->where('slug', request()->category);
            });
            $categories = Category::all();
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            $products = $products->paginate(9);
        }else{
           $products = Product::take(12)->paginate(6);
           $categoryName = 'Featured';
        }

        return view('pages.store.index')->with([
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

        /* Toma cuatro producto diferentes para colocarlos de sugerencias*/
        $mightAlsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();
//        return $mightAlsoLike;
        /* Indica si ese producto a un tiene stok */
        $stockLevel = getStockLevel($product->quantity);
//        return $product;
        return view('pages.store.show')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike,
            'stockLevel' => $stockLevel
        ]);
    }
}
