<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller {
    use ImageTrait;
    
    public function index() {
        return view('dashboard.posts', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create() {
        return view('dashboard.new-post');
    }

    public function edit(Post $post) {
        return view('dashboard.edit-post', [
            'post' => $post
        ]);
    }

    protected function store() {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'tags' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['thumbnail'] = $this->saveImage(request()->file('thumbnail'));

        Post::create($attributes);

        return redirect('/');
    }

    protected function update(Post $post) {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'tags' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = $this->saveImage(request()->file('thumbnail'));
        }

        $post->update($attributes);

        return back()->with('flash.banner', 'Post updated!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return back()->with('flash.banner', 'Post deleted!');
    }
}
