<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller {
    use ImageTrait;
    
    public function index() {
        return view('dashboard.all-posts', [
            'posts' => Photo::paginate(50)
        ]);
    }

    protected function store() {
        $attributes = request()->validate([
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
        ]);

        $attributes['thumbnail'] = $this->saveImage(request()->file('thumbnail'));

        Photo::create($attributes);

        return redirect('/');
    }
}
