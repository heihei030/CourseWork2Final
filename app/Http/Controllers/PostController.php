<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        auth()->user()->posts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $item = Post::findOrFail($id);

        return view('posts.show', compact('item'));
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


}
