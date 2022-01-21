<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;


class AdminPostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->simplePaginate(20)
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


        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);

        return redirect('/admin/posts')->with('message', 'The post was updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();



        return back()->with('message', 'The post was successfully deleted!');
    }

}
