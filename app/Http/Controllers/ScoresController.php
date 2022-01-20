<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ScoresController extends Controller
{
    public function index()
    {
        return view('posts/scores', [


            'posts' => Post::all()->where('active', 1)->sortByDesc(function ($post) {
            return $post->scores->avg('total_score');
        })

    ]);

    }

    public function store(Post $post)
    {
        if (!Score::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists())
        {
        request()->validate([
            'comment' => 'nullable',
            'total-score' => 'required|integer|max:10'
        ]);

        $post->scores()->create([
            'user_id' => request()->user()->id,
            'comment' => request('comment'),
            'total_score' => request('total-score')
        ]);

        return back()->with('message', 'Thanks for your rating!');
    }else {

        return back()->with('message', 'You have already voted.');
    }
    }
}
