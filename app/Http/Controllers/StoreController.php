<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

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
        $product = Product::with('images','category','dimensions', 'quantities')->where('slug', $slug)->firstOrFail();
        $json_product = json_decode($product, true);

        if ($json_product['dimensions']) {
            foreach ($json_product['dimensions'] as $item) {
                $dimens [] = $item['dimension'];
            }
        }else{
            $dimens = '';
        }

        if ($json_product['quantities']){
            foreach ($json_product['quantities'] as $item) {
                $quantities[] = $item['quantity'];
            }
        }else{
            $quantities = '';
        }

        /* Toma cuatro producto diferentes para colocarlos de sugerencias*/
        $mightAlsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();
//        return $mightAlsoLike;
        /* Indica si ese producto a un tiene stok */
        $stockLevel = getStockLevel($product->quantity);
//        return $product;
        return view('pages.store.show')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike,
            'stockLevel' => $stockLevel,
            'dimensions' => $dimens,
            'quantities' => $quantities
        ]);
    }
}
