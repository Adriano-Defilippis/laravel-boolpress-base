<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\URL;
use App\Tag;

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
        $posts = Post::orderBy('updated_at', 'DESC')
                  ->take(5)
                  -> get();
                  // dd($posts);
        $type_view = "Last 5 Posts";
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
        // return back()->back();
        $id_category = $validatedData["category_id"];

        // return redirect()->route('category' , [$id_category]);
        // $validatedData["category_id"]
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

    public function showPostsFromTag($id){

      $tag = Tag::findOrFail($id);
      $categories = Category::all();
      $type_view = "Posts Relative at tag: " . $tag -> name;
      return view ('page.postsTag', compact('tag', 'type_view', 'categories'));
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
          "category_id" => 'required',
          "img" => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        $file = $request -> file('img');

        if ($file) {

          $target_path = "img";
          $target_file = $id . "-imgPost." . $file->getClientOriginalExtension();

          $file->move($target_path, $target_file);

          $validatedData['img'] = $target_file;

        }

        $editedpost = Post::whereId($id) -> update($validatedData);

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
