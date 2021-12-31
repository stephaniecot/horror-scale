<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function store(Post $post)
    {
        if (!Favorite::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists())
        $post->favorite()->create([
            'user_id' => request()->user()->id
        ]);
        return back();
    }

    public function index()
    {

        return view('favorites', [
            'favorites' => Favorite::all()->where('user_id', Auth::user()->id)
        ]);
    }

    public function destroy(Post $post)
    {
        $post->favorite()->delete();

        return back()->with('success', 'Post Deleted!');
    }

}
