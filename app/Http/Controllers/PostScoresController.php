<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostScoresController extends Controller
{
    public function store(Post $post)
    {
        if (!Score::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists())
        {
        request()->validate([
            'comment' => 'nullable',
            'spooky_score' => 'nullable|integer|max:10',
            'suspense_score' => 'nullable|integer|max:10',
            'gore_score' => 'nullable|integer|max:10',
            'disturbing_score' => 'nullable|integer|max:10',
            'total-score' => 'required|integer|max:10'
        ]);

        $post->scores()->create([
            'user_id' => request()->user()->id,
            'comment' => request('comment'),
            'spooky_score' => request('spooky_score'),
            'suspense_score' => request('suspense_score'),
            'gore_score' => request('gore_score'),
            'disturbing_score' => request('disturbing_score'),
            'total_score' => request('total-score')
        ]);

        return back();
    }else {
        //TODO: arranger le message d'erreur
        return back()->with('warning', 'You have already voted.');
    }
    }
}
