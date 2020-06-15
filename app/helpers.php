<?php

Use Carbon\Carbon;

function getStockLevel($quantity)
{
   /* if ($quantity > setting('site.stock_threshold', 5)) {
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    } elseif ($quantity <= setting('site.stock_threshold', 5) && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">Not available</div>';
    }*/

   if($quantity > 5) {
       $stockLevel = '<div class="badge badge-success">In Stock</div>';
   }elseif (($quantity > 0) && $quantity <= 5){
       $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
   }else{
       $stockLevel = '<div class="badge badge-danger">Not available</div>';
   }

    return $stockLevel;
}

function getNumbers()
{

    $tax = config('cart.tax') / 100;
    $newSubtotal = (\Cart::session('default')->getSubTotal());
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
//    dd($newSubtotal);
    $newTax = $newSubtotal * $tax;
//    dd($newTax);
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

function presentPrice($price)
{
    $usa = new NumberFormatter("en-US", NumberFormatter::DEFAULT_STYLE);
    $formatted1 = $usa->format($price);
    return $formatted1;
}

function ProductImageStorage($path)
{
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : asset('asset/images/image_not_available.jpg');
}


