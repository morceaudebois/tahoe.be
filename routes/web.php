<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home', [
        'posts' => Post::with('category')->get()
    ]);
})->name('home');

Route::get('post/{post:slug}', function (Post $post) {
    return view('pages.post', [
        'post' => $post
    ]);
})->name('post');

Route::get('/photography', function () {
    return view('pages.photography');
})->name('photography');

Route::get('/about', function () {
    return 'later';
})->name('about');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
