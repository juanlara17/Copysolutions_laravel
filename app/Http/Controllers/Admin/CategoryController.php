<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $categories = Category::where('name','like',"%$name%")->orderBy('name')->paginate(5);

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
        $request->validate([
            'name' => 'required|max:5|unique:categories,name',
            'slug' => 'required|max:50|unique:categories,slug',
            'description' => 'max:50',
        ]);
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
        $cat = Category::where('slug', $slug)->firstOrFail();
        $editar = 'Si';
        return view('admin.category.show', compact('cat'));
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

        $request->validate([
            'name' => 'required|max:50|unique:categories,name',$cat->id,
            'slug' => 'required|max:50|unique:categories,slug',$cat->id,
            'description' => 'max:50',$cat->id
        ]);
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
        $cat = Category::findOrFail($id);
        $cat->delete();

        return redirect()->route('admin.category.index')->with('message', 'Record deleted successfully');
    }
}
