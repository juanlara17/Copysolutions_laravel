<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $products = Product::with('images', 'category')->where('name','like',"%$name%")->orderBy('name')->paginate(5);
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
        $states_product = $this->state_products();

        return view('admin.product.create',compact('categories', 'states_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required|unique:products,name',
            'slug' => 'required|unique:products,slug',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'extract' => $request->get('extract'),
            'price_old' => $request->get('price_old'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
            'visits' => $request->get('visits'),
            'sale' => $request->get('sales'),
            'quantity' => $request->get('quantity'),
            'percent_promo' => $request->get('percent_promo'),
            'state' => $request->get('state'),
            'visible' => $request->has('active') ? 1 : 0,
            'slide_principal' => $request->has('slide_principal') ? 1 : 0,
        ];

        /***** Tratamiento de la imagenes para guardar las url's en database *****/
        $urlImages = [];

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {

                $name = time().'_'.$image->getClientOriginalName();

                $route = public_path().'/images';

                $image->move($route, $name);

                $urlImages[]['url'] = '/images/'.$name;
            }
        }
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

        $product->images()->createMany($urlImages);

        return redirect()->route('admin.product.index')->with('message',
            'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::with('images', 'category')->where('slug', $slug)->firstOrFail();
        $categories = Category::orderBy('name')->get();
        $states_product = $this->state_products();

        return view('admin.product.show', compact('product', 'categories', 'states_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::with('images', 'category')->where('slug', $slug)->firstOrFail();

        $categories = Category::orderBy('name')->get();

        $states_product = $this->state_products();

//        dd($state_product);

        return view('admin.product.edit', compact('product','categories', 'states_product'));
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
        $request->validate([
            'name' => 'required|unique:products,name,'.$id,
            'slug' => 'required|unique:products,slug,'.$id,
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        /*$data = [
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'extract' => $request->get('extract'),
            'price_old' => $request->get('price_old'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
            'visits' => $request->get('visits'),
            'sale' => $request->get('sales'),
            'quantity' => $request->get('quantity'),
            'percent_promo' => $request->get('percent_promo'),
            'state' => $request->get('state'),
            'visible' => $request->has('active') ? 1 : 0,
            'slide_principal' => $request->has('slide_principal') ? 1 : 0,
        ];*/

        /***** Tratamiento de la imagenes para guardar las url's en database *****/
        $product = Product::findOrFail($id);

        $urlImages = [];

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {

                $name = time().'_'.$image->getClientOriginalName();

                $route = public_path().'/images';

                $image->move($route, $name);

                $urlImages[]['url'] = '/images/'.$name;
            }
        }
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
            }

//        $product = Product::findOrFail($id)::create($data);
        $product->save();

        $product->images()->createMany($urlImages);

        return redirect()->route('admin.product.edit', $product->slug)->with('message',
            'Record update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::with('images')->findOrFail($id);
        foreach ($product->images as $image) {
            $urlFile = substr($image->url, 1);
            File::delete($urlFile);
            $image->delete();
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('message', 'Record deleted successfully');
    }

    public function state_products()
    {
        return [
            '',
            'New',
            'Offer',
            'Popular',
        ];
    }
}
