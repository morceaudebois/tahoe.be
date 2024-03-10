<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'width',
        'height',
        'excerpt',
        'draft',
        'date'
    ];

    public function getThumbnailUrl($size = 'lg') {
        $thumbnailName = substr_replace($this->thumbnail, $size . '_', 11, 0);
        return asset('storage') . '/' . $thumbnailName;
    }
}
