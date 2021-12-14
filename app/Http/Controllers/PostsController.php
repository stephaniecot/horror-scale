<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'thumbnail' => 'required|image',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'active' => 'required|boolean',
            'summary' => 'required'
        ]);

        Post::create([
            'user_id' => request()->user()->id,
            'slug' => Str::slug(request('title')).'-'.Str::slug(request('author')).'-'.request('year'),
            'active' => request()->boolean('active'),
            'title' => request('title'),
            'author' => request('author'),
            'year' => request('year'),
            'category_id' => request('category_id'),
            'summary' => request('summary'),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]);
        return redirect('/');
    }

    public function getSlug($title, $id)
    {
        $slug = Str::slug($title).'-'.$id;
        return $slug;
    }

}
