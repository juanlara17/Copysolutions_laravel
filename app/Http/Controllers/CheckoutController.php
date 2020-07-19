<?php

namespace App\Http\Controllers;



use App\Http\Requests\CheckoutRequest;
use App\Order;
use App\OrderProduct;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{

    public function index()
    {
        return view('pages.cart.checkout')->with([
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

    public function store(CheckoutRequest $request)
    {

        $contents = \Cart::session('default')->getContent()->map(function ($item) {
            return $item->model->slug . ', ' . $item->quantity;
        })->values()->toJson();

//        return $this->getNumbers()->get('newTotal');

        try {
            $stripe = Stripe::make('sk_test_P4dzHxA9zzPjmA5YCJVP5lsY00tVSkpyPw', '2020-03-02 ');
            $charge = $stripe->charges()->create([
                'amount' => $this->getNumbers()->get('newTotal'),
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => \Cart::session('default')->getContent()->count()
                ]
            ]);
            /***** Insert Orders Table *****/
            $this->addToOrdersTable($request, null);

            \Cart::session('default')->clear();
            return redirect()->route('confirmation.index')->with('success_message', 'Thank you!, Your payment has been successfully accepted');

        } catch (\Cartalyst\Stripe\Exception\CardErrorException $exception) {
//            @dd($exception->getMessage());
            $this->addToOrdersTable($request, $exception->getMessage());
            return back()->withErrors('Error!', $exception->getMessage());
        }
    }

    public function addToOrdersTable($request, $error)
    {
        /**** Insert into orders table ****/
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' => $this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_tax' => $this->getNumbers()->get('newTax'),
            'billing_total' => $this->getNumbers()->get('newTotal'),
            'error' => $error,
        ]);

        /***** Insert into order_product table *****/
        foreach (\Cart::session('default')->getContent() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->quantity
            ]);
        }
    }

    public function getNumbers()
    {
        $tax = config('cart.tax');
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $newSubtotal = (\Cart::session('default')->getSubtotal() - $discount);
        $newTax = $newSubtotal * ($tax/100);
        $newTotal = $newSubtotal + $newTax;

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'code' => $code,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
        //
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
}
