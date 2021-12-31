<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminPostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(15)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => $post->exists ? ['required'] : ['required', Rule::unique('posts', 'title')->where('author', request('author'))],
            'author' => 'required',
            'year' => 'required',
            'thumbnail' =>  $post->exists ? ['image'] : ['required', 'image'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'active' => [Rule::requiredIf(request()->user()->is_admin),'boolean'],
            'summary' => 'required',
            'slug' => 'unique'
        ]);

        // $post->update([
        //     'user_id' => request()->user()->id,
        //     'slug' => Str::slug(request('title')).'('.Str::slug(request('author')).')',
        //     'active' => request()->boolean('active'),
        //     'title' => request('title'),
        //     'author' => request('author'),
        //     'year' => request('year'),
        //     'category_id' => request('category_id'),
        //     'summary' => request('summary'),
        //     'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        // ]);
        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);

        return redirect('/admin/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

}
