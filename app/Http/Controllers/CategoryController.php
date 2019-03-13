<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    public function view($id)
    {
        $category = Category::where('id', $id)->first();

        return view('category.view', compact('category', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        //return redirect('/post')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
        return redirect()->route('viewCategory', ['id' => $category->id]);
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
        $category = Category::where('id', $id)->first();

        return view('category.edit', compact('category', 'id'));
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
        $category = Category::find($id)->first();
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        //dd($request);


        //return redirect('/admin')->with('success', 'New support post has been updated!!');
        return redirect()->route('viewCategory', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Category::find($id);
        $post->delete();

        return back()->with('success', 'Category has been deleted!!');
    }
}
