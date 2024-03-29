<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Photo::insert([
            [
                'likes' => 4,
                'thumbnail' => 'thumbnails/dog.jpg',
                'width' => 1080,
                'height' => 1920,
                'info' => "bonjour",
                'uuid' => Str::random(8)
            ]
        ]);
    }
}
