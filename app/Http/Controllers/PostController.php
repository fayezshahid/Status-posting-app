<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store', 'destroy');
    }
    public function index()
    {
        $posts = Post::latest()->with('user', 'likes')->paginate(20);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    public function edit(Post $post)
    {

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post->update($request->only('body'));

        return redirect()->route('posts');

    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts');
    }
}
