<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function index () {
        $posts = \App\Post::latest()->get();
        // dd($posts->toArray()); // dump die
        return view('posts.index')->with('posts', $posts);
    }

    public function show (\App\Post $post) {
        // $post = \App\Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    public function create () {
        return view('posts.create');
    }

    public function store (PostRequest $request) {
        $post = new \App\Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->name = $request->name;
        $post->save();
        return redirect('/');
    }

    public function edit (\App\Post $post) {
        return view('posts.edit')->with('post', $post);
    }

    public function update (PostRequest $request, \App\Post $post) {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->name = $request->name;
        $post->save();
        return redirect('/');
    }

    public function destroy(\App\Post $post) {
        $post->delete();
        return redirect('/');
    }
}
