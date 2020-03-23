<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function autocomplete(Request $request)
    {
        $wordsearch = $request->get('wordsearch');
        $Products = Product::where('name', 'like', '%' . $wordsearch . '%')->orderBy('name')->get();

        $result = [];

        foreach ($Products as $product) {

            $findword = stristr($product->name, $wordsearch);
            $product->find = $findword;
//            dd($findword);

            $cutword = substr($findword, 0, strlen($wordsearch));
            $product->find = $cutword;

            $product->name_black = str_ireplace($wordsearch, "<b>$cutword</b>", $product->name);

            $result[] = $product;
        }

        return $result;
    }
}
