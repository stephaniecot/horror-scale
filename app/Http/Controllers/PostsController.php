<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts/index', [
            'posts' => Post::latest()->where('active', 1)
                ->filter(request(['search', 'category'])
                    )->simplePaginate(12)->withQueryString(),
            'categories' => Category::all()
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
            'title' => ['required', Rule::unique('posts', 'title')->where('author', request('author'))],
            'author' => 'required',
            'year' => 'required|integer',
            'thumbnail' => 'required|image',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'active' => [Rule::requiredIf(request()->user()->is_admin),'boolean'],
            'summary' => 'required',
            'slug' => 'unique'
        ]);



        Post::create([
            'user_id' => request()->user()->id,
            'slug' => Str::slug(request('title')).'('.Str::slug(request('author')).')',
            'active' => request()->boolean('active'),
            'title' => request('title'),
            'author' => request('author'),
            'year' => request('year'),
            'category_id' => request('category_id'),
            'summary' => request('summary'),
            'thumbnail' => request()->file('thumbnail')
        ]);
        Storage::disk('s3')->put('thumbnails', request()->file('thumbnail'));


        return redirect('/posts')->with('message', 'Your post was created. Please wait until it is reviewed');
    }



}
