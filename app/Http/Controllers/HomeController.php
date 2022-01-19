<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Score;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home')
        ->with('posts', Post::all()->where('active', 1))
        ->with('scores', Post::all()->where('active', 1)->sortByDesc(function ($post) {
            return $post->scores->avg('total_score');
        }))
        ->with('categories', Category::all());
    }

}
