<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{

    public function index()
    {

        $mightAlsoLike = Product::inRandomOrder()->take(4)->get();
//        \Debugbar::info($mightAlsoLike);

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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,10'
        ]);

        if($validator->fails()){
            session()->flash('errors', collect(['Quantity must be between 1 and 5']));
            return response()->json(['success' => false], 400);
        }

        $items = \Cart::session('default')->getContent();

        foreach ($items as $item){
            if($item->id === $id){
                $item->quantity = $request->quantity;
            }
        }
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
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

