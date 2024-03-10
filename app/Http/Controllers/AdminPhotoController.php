<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminPhotoController extends Controller {
    use ImageTrait;
    
    public function index() {
        return view('dashboard.photos', [
            'photos' => Photo::paginate(50)
        ]);
    }

    public function create() {
        return view('dashboard.photo-form');
    }

    public function edit(Photo $photo) {
        return view('dashboard.photo-form', [
            'photo' => $photo
        ]);
    }

    protected function store() {
        $attributes = request()->validate([
            'thumbnail' => 'required|image',
            'info' => 'required',
            'draft' => 'sometimes',
            'date' => ['required', 'date'],
        ]);

        $attributes['draft'] = request()->draft ? 1 : 0;

        $file = request()->file('thumbnail');
        $attributes['thumbnail'] = $this->saveImage($file);

        $image = Image::make($file);

        $attributes['width'] = $image->width();
        $attributes['height'] = $image->height();

        Photo::create($attributes);

        return redirect()->route('dashboard.photos');
    }

    protected function update(Photo $photo) {
        $attributes = request()->validate([
            'thumbnail' => 'image',
            'info' => 'string|max:200',
            'draft' => 'sometimes',
            'date' => ['required', 'date'],
        ]);

        $attributes['draft'] = request()->draft ? 1 : 0;

        $file = request()->file('thumbnail');

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = $this->saveImage($file);

            $image = Image::make($file);

            $attributes['width'] = $image->width();
            $attributes['height'] = $image->height();
        }

        $photo->update($attributes);

        return back()->with('flash.banner', 'Photo updated!');
    }

    public function destroy(Photo $photo) {
        $photo->delete();
        return back()->with('flash.banner', 'Photo deleted!');
    }
}
