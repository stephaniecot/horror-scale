<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Score;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home')
        ->with('posts', Post::all())
        ->with('scores', Score::all());
    }
}
