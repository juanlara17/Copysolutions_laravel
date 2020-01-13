<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$cat = new Category();
        $cat->name          = $request->nombre;
        $cat->slug          = $request->slug;
        $cat->description   = $request->descripcion;
        $cat->save();*/

        //return Category::create($request->all());
        Category::create($request->all());

        return redirect()->route('admin.category.index')->with('message',
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
        if (Category::where('slug', $slug)->first()) {
            return 'Slug existente';
        }else{
            return 'Slug disponible';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($slug)
    {
        $cat = Category::where('slug', $slug)->firstOrFail();
        $edit = 'Si';

        return view('admin.category.edit', compact('cat', 'edit'));
    }
    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($id);
        /*$cat->name          = $request->name;
        $cat->slug          = $request->slug;
        $cat->description   = $request->description;
        $cat->save();
        */

        $cat->fill($request->all())->save();
        //return $cat;


        return redirect()->route('admin.category.index')->with('message',
            'Record updated successfully');
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
