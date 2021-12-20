<?php

use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostScoresController;
use App\Http\Controllers\ScoresController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::get('create', [PostsController::class, 'create'])->middleware('auth');
Route::post('create', [PostsController::class, 'store'])->middleware('auth');

Route::get('scores', [ScoresController::class, 'index']);
Route::post('posts/{post:slug}/scores', [ScoresController::class, 'store']);

Route::post('posts/{post:slug}', [FavoritesController::class, 'store'])->middleware('auth');
Route::get('favorites', [FavoritesController::class, 'index'])->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
