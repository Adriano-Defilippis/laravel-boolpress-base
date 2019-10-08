<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $categories = Category::all();
        $posts = Post::orderBy('updated_at', 'ASC')
                  ->take(5)
                  -> get();
        $type_view = "All Posts";
        return view('page.post_index', compact('categories','posts', 'type_view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $type_view = 'Add New Post';
        return view('page.form_create', compact('type_view', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
          "title" => 'required',
          "desc" => 'required',
          "content" => 'required',
          "author" => 'required',
          "category_id" => 'required'
        ]);

        $post = Post::create($validatedData);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);

        $type_view = "Username: " .  $post ->  author ;

        return view ('page.post_content', compact('post','type_view', 'categories'));
    }

    public function postsCategory($id){

      $categories = Category::all();
      $category = Category::findOrFail($id);
      $type_view = $category -> name;
      return view ('page.postCategory_show', compact('type_view', 'category', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $post = Post::findOrFail($id);
      $categories = Category::all();
      $type_view = 'Edit Post';
      return view('page.form_edit', compact('type_view', 'categories', 'post'));
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
        $validatedData = $request -> validate([
          "title" => 'required' ,
          "desc" => 'required' ,
          "content" => 'required' ,
          "author" => 'required' ,
          "category_id" => 'required'
        ]);

        $editedpost = Post::whereId($id) -> update($validatedData);
        // return redirect ('/');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id) -> delete();
        // return redirect('/');
        return redirect()->back();
    }
}
