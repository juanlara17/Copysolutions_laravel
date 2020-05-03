<?php

namespace App\Http\Controllers;



use App\Http\Requests\CheckoutRequest;
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

        try {
            $stripe = Stripe::make('sk_test_P4dzHxA9zzPjmA5YCJVP5lsY00tVSkpyPw', '2020-03-02 ');
            $charge = $stripe->charges()->create([
                'amount' => \Cart::session('default')->getTotal() / 100,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => \Cart::session('default')->getContent()->count()
                ]
            ]);
            \Cart::session('default')->clear();
            return redirect()->route('confirmation.index')->with('success_message', 'Thank you!, Your payment has been successfully accepted');

        } catch (CardErrorException $exception) {
            return back()->withErrors('Error!', $exception->getMessage());
        }
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
