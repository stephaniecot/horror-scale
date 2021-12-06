<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    public function index()
    {
        return view('scores.index', [

            'posts' => Post::all()->sortByDesc(function ($post) {
            return $post->scores->sum('total_score');
        })

    ]);


    }
}
