<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;


class PostsController extends Controller
{
    public function index()
    {
       // with DB library
       //  $posts = DB::select('SELECT * fROM posts')

         // return
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();
        // $posts = Post::orderBy('title', 'desc')->get();
        // $posts = Post::where('title', 'Post two')->get();

        //pagination
        $posts = Post::orderBy('created_at', 'desc')->paginate(2);


     //$posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Create Post
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
