<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'tags',
        'excerpt',
        'body',
        'category_id',
        'thumbnail',
        'date',
        'draft',
        'likes'
    ];
    
    public function getRouteKeyName(): string {
        return 'slug';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags(): Collection {
        return collect(explode('|', $this->tags));
    }

    public function getThumbnailUrl($size = 'lg') {
        $thumbnailName = substr_replace($this->thumbnail, $size . '_', 11, 0);
        return asset('storage') . '/' . $thumbnailName;
    }
}
