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
        return view('scores', [

            'posts' => Post::all()->where('active', 1)->sortByDesc(function ($post) {
            return $post->scores->sum('total_score');
        })

    ]);

    }

    public function store(Post $post)
    {
        if (!Score::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists())
        {
        request()->validate([
            'comment' => 'nullable',
            'spooky-score' => 'nullable|integer|max:5',
            'suspense-score' => 'nullable|integer|max:5',
            'gore-score' => 'nullable|integer|max:5',
            'disturbing-score' => 'nullable|integer|max:5',
            'total-score' => 'required|integer|max:10'
        ]);

        $post->scores()->create([
            'user_id' => request()->user()->id,
            'comment' => request('comment'),
            'spooky_score' => request('spooky-score'),
            'suspense_score' => request('suspense-score'),
            'gore_score' => request('gore-score'),
            'disturbing_score' => request('disturbing-score'),
            'total_score' => request('total-score')
        ]);

        return back();
    }else {
        //TODO: arranger le message d'erreur
        return back()->with('warning', 'You have already voted.');
    }
    }
}
