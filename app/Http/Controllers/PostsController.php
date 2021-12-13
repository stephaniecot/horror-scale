<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // public function index()
    // {
    //     return view('index', [
    //         'posts' => Post::all()
    //     ]);
    // }

    public function index()
    {
        return view('index', [
            'posts' => Post::latest()->where('active', 1)
                ->filter(request(['search', 'category'])
                    )->paginate(18)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        if($post->active == true) {
        return view('posts.show', [
            'post' => $post

        ]);
    }
    return abort(404);
    }

    public function create()
    {
        return view('create');
    }

}
