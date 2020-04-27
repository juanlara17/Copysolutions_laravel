<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $product = Product::inRandomOrder()->take(12)->get();
        $product = Product::find(66);

        $rowId = 456;   // generate a unique() row ID
        $userID = 2;
        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 4,
            'attributes' => array(),
            'model' => $product
        ));
//        $items = \Cart::getContent();

//        return $items;
//        Cart::add(455, 'Sample Item', 100.99, 2, array());       ;

//        return \Cart::getContent()->count();
        return view('pages.cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        return redirect()->route('cart.index');
    }*/


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function switchToSaveForLater($id)
    {
        $item = \Cart::get($id);
        return $item;
        return view('pages.cart.index');
    }

}

