<?php

use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ScoresController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('posts', [PostsController::class, 'index']);

Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::get('create', [PostsController::class, 'create'])->middleware('auth');
Route::post('create', [PostsController::class, 'store'])->middleware('auth');

Route::get('scores', [ScoresController::class, 'index']);
Route::post('posts/{post:slug}/scores', [ScoresController::class, 'store']);

Route::post('posts/{post:slug}', [FavoritesController::class, 'store'])->middleware('auth');
Route::get('favorites', [FavoritesController::class, 'index'])->middleware('auth')->name('favorites');;
Route::delete('favorites/{post}', [FavoritesController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/', [AdminPostsController::class, 'index'])->middleware('can:admin');
Route::get('admin/posts/{post}/edit', [AdminPostsController::class, 'edit'])->middleware('can:admin');
Route::patch('admin/posts/{post}', [AdminPostsController::class, 'update'])->middleware('can:admin');
Route::delete('admin/posts/{post}', [AdminPostsController::class, 'destroy'])->middleware('can:admin');

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
