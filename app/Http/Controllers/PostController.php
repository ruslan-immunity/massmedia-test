<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function view($id)
    {
        $post = Post::where('id', $id)->first();

        return view('post.view', compact('post', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'content' =>'required',
            'file' => 'nullable|file|mimes:jpeg,png|max:2000',
        ]);

        $post->name = $request->name;
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        if (Input::hasFile('file'))
        {
            $fileName = 'fileName'.time().'.'.request()->file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/files');

            Input::file('file')->move($destinationPath, $fileName);
            $post->file = $fileName;
            $img = Image::make(public_path('uploads/files/') . $fileName);

            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save(public_path('uploads/files/') . $fileName);
        }

        $post->save();

        //return redirect('/post')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
        return redirect()->route('viewPost', ['id' => $post->id]);
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
        $post = Post::where('id', $id)->first();
        //$post->file = Input::file('file')->getClientOriginalName();
        $categories = Category::all();
        
        return view('post.edit', compact('post', 'id', 'categories'));
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
        $post = Post::find($id)->first();
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'content' =>'required',
            'file' => 'nullable|file|mimes:jpeg,png|max:2000',
        ]);
        $post->name = $request->name;
        $post->category_id = $request->category_id;
        $post->content = $request->content;

        if (Input::hasFile('file'))
        {
            $fileName = 'fileName'.time().'.'.request()->file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/files');

            Input::file('file')->move($destinationPath, $fileName);
            $post->file = $fileName;
            $img = Image::make(public_path('uploads/files/') . $fileName);

            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save(public_path('uploads/files/') . $fileName);
        }

        $post->save();
        //dd($request);


        //return redirect('/admin')->with('success', 'New support post has been updated!!');
        return redirect()->route('viewPost', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return back()->with('success', 'Post has been deleted!!');
    }
}
