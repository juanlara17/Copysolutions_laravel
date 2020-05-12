<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SaveForLaterController extends Controller
{
    public function destroy($id)
    {
        \Cart::session('saveForLater')->remove($id);

        return back()->with('success_message', 'Item has been removed:');
    }

    public function switchToCart($id)
    {
        $product = new Product();
        $item = \Cart::session('saveForLater')->get($id);

        $itemsDefault = \Cart::session('default')->getContent();
//        return $itemsDefault;
        \Cart::session('saveForLater')->remove($id);

        foreach ($itemsDefault as $items) {
//        return $items->id;
            if ($items->id === $item->id) {
                return redirect()->route('cart.index')->with('success_message', 'Item is already in your Cart');
            }
        }

        \Cart::session('default')->add($item->id, $item->name, $item->price, 1, array())->associate($product);
        return redirect()->route('cart.index')->with('success_message', 'Item has been moved to your Cart');
    }
}
