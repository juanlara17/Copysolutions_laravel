<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $products = Product::where('name','like',"%$name%")->orderBy('name')->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:products,name',
            'slug' => 'required|unique:products,slug',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        /*$data = [
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'extract' => $request->get('extract'),
            'price_old' => $request->get('price_old'),
            'price' => $request->get('price'),
            /*'image' => $request->get('image'),
            'category_id' => $request->get('category_id'),
            'visits' => $request->get('visits'),
            'sale' => $request->get('sales'),
            'quantity' => $request->get('quantity'),
            'percent_promo' => $request->get('percent_promo'),
            'state' => $request->get('state'),
            'visible' => $request->has('active') ? 1 : 0,
            'slide_principal' => $request->has('slide_principal') ? 1 : 0,
        ];*/


    /*    $product = New Product;

        $product->visits    = $request->visits;
        $product->sales     = $request->sales;
        $product->name      = $request->name;
        $product->slug      = $request->slug;
        $product->category_id = $request->category_id;
        $product->quantity  = $request->quantity;
        $product->price_old = $request->price_old;
        $product->price     = $request->price;
        $product->percent_promo = $request->percent_promo;
        $product->description = $request->description;
        $product->extract   = $request->extract;
        $product->state     = $request->state;

        if ($request->active) {
            $product->visible = 1;
        }else{
            $product->visible = 0;
        }

        if ($request->slide_principal) {
            $product->slide_principal = 1;
        }else{
            $product->slide_principal = 0;
        }*/

        $product = Product::create($data);

        $request->$product();
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
