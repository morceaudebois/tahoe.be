<?php

use App\Models\Post;
use App\Models\Photo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminPhotoController;
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
    return view('pages.photography', [
        'photos' => Photo::all()
    ]);
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

    // posts
    Route::resources(['dashboard/posts' => AdminPostController::class,],
        ['names' => [
            'index' => 'dashboard.posts',
            'create' => 'dashboard.post.create',
            'store' => 'dashboard.post.store',
            'show' => 'dashboard.post.show',
            'edit' => 'dashboard.post.edit',
            'update' => 'dashboard.post.update',
            'destroy' => 'dashboard.post.destroy'
        ]
    ]);

    // photos
    Route::resources(['dashboard/photos' => AdminPhotoController::class,],
        ['names' => [
            'index' => 'dashboard.photos',
            'create' => 'dashboard.photo.create',
            'store' => 'dashboard.photo.store',
            'show' => 'dashboard.photo.show',
            'edit' => 'dashboard.photo.edit',
            'update' => 'dashboard.photo.update',
            'destroy' => 'dashboard.photo.destroy'
        ]
    ]);

});
