<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'width',
        'height',
        'draft',
        'date',
        'likes',
        'info',
        'cope',
        'uuid'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($photo) {
            // Set the default UUID value if it's not already set
            $photo->uuid = Str::random(8);
        });
    }

    public function getThumbnailUrl($size = 'lg') {
        $thumbnailName = substr_replace($this->thumbnail, $size . '_', 11, 0);
        return asset('storage') . '/' . $thumbnailName;
    }
}
