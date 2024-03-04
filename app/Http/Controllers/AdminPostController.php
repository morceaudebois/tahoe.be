<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller {
    public function index() {
        return view('dashboard.all-posts', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function edit(Post $post) {
        return view('dashboard.edit-post', [
            'post' => $post
        ]);
    }
    
    function resizeAndSaveAlts($imageFile, $name, $size = 'lg') {
        $dimensions = ['md' => 680, 'lg' => 1056, 'xl' => 2112];

        Image::make($imageFile)->resize($dimensions[$size], null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path("storage/thumbnails/{$size}_{$name}"));
    }

    function saveThumbnail($imageFile) {
        $imageNameExt = $imageFile->hashName(); // name with og file extension
        $imageName = basename($imageNameExt); // name without 

        // pixel perfect thumbnails for retina display
        $this->resizeAndSaveAlts($imageFile, $imageName, 'md');
        $this->resizeAndSaveAlts($imageFile, $imageName, 'lg');
        $this->resizeAndSaveAlts($imageFile, $imageName, 'xl');

        return $imageFile->storeAs('thumbnails', $imageNameExt);
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

        $attributes['thumbnail'] = $this->saveThumbnail(request()->file('thumbnail'));

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
            $attributes['thumbnail'] = $this->saveThumbnail(request()->file('thumbnail'));
        }

        $post->update($attributes);

        return back()->with('flash.banner', 'Post updated!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return back()->with('flash.banner', 'Post deleted!');
    }
}
