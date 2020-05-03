<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $mightAlsoLike = Product::inRandomOrder()->take(4)->get();

        return view('pages.cart.index')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal')
        ]);
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


    public function store(Request $request)
    {
        $items = \Cart::getContent();
        foreach ($items as $item) {
            if ($item->id === $request->id) {
                return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
            }
        }
        $product = new Product();
        \Cart::session('default')->add($request->id, $request->name, $request->price, 1, array())->associate($product);
        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
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
        \Cart::session('default')->remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }

    public function switchToSaveForLater($id)
    {
        $product = new Product();
        $item = \Cart::session('default')->get($id);
        \Cart::remove($id);

        $itemsSave = \Cart::session('saveForLater')->getContent();
//        return $item;

        foreach ($itemsSave as $items) {
            if ($items->id === $item->id) {
                return redirect()->route('cart.index')->with('success_message', 'Item is already in Save For Later');
            }
        }

        \Cart::session('saveForLater')->add($item->id, $item->name, $item->price, 1, array())->associate($product);
        return redirect()->route('cart.index')->with('success_message', 'Item has been Save For Later!');
    }


}

