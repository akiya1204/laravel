<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    } 

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        // dd($posts->comments);

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
            return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'body' => 'required|max:2000',
        ]);
        $user = \Auth::user();

        $params['user_id'] = $user->id;
        $params['user_name'] = $user->name;

        Post::create($params);

        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);

        // dd($post);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);
    
        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();
    
        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);

        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }
}
