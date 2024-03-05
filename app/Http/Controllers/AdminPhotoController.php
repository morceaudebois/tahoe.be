<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminPhotoController extends Controller {
    use ImageTrait;
    
    public function index() {
        return view('dashboard.all-photos', [
            'photos' => Photo::paginate(50)
        ]);
    }

    protected function store() {
        $attributes = request()->validate([
            'thumbnail' => 'required|image',
            'excerpt' => 'required'
        ]);

        $file = request()->file('thumbnail');
        $attributes['thumbnail'] = $this->saveImage($file);

        $image = Image::make($file);

        $attributes['width'] = $image->width();
        $attributes['height'] = $image->height();

        Photo::create($attributes);

        return redirect('/');
    }

    public function destroy(Photo $photo) {
        $photo->delete();
        return back()->with('flash.banner', 'Photo deleted!');
    }
}
