<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait ImageTrait {
    public function resizeAndSaveAlts($imageFile, $name, $size = 'lg') {
        $dimensions = ['md' => 680, 'lg' => 1056, 'xl' => 2112];

        Image::make($imageFile)->resize($dimensions[$size], null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save(public_path("storage/thumbnails/{$size}_{$name}"));
    }

    public function saveImage($imageFile) {
        $imageNameExt = $imageFile->hashName(); // name with original file extension
        $imageName = basename($imageNameExt); // name without extension

        // Pixel perfect thumbnails for retina display
        $this->resizeAndSaveAlts($imageFile, $imageName, 'md');
        $this->resizeAndSaveAlts($imageFile, $imageName, 'lg');
        $this->resizeAndSaveAlts($imageFile, $imageName, 'xl');

        return $imageFile->storeAs('thumbnails', $imageNameExt);
    }
}
