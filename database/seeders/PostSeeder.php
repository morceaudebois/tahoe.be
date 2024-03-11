<?php

namespace Database\Seeders;

use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Post::insert([
            [
                'title' => 'My favorite dogs',
                'excerpt' => 'Create a list of your favorite dog breeds and share it with your friends.',
                'category_id' => 1,
                'tags' => '2022|dogs|php',
                'slug' => 'myfavoritedogs',
                'likes' => 4,
                'external_url' => 'https://myfavoritedogs.tahoe.be',
                'body' => 'the bodyè',
                'draft' => false
            ],
            [
                'title' => 'Another post',
                'excerpt' => 'Create a list of your favorite dog breeds and share it with your friends.',
                'category_id' => 2,
                'slug' => 'bloublou',
                'likes' => 2,
                'external_url' => 'https://myfavoritedogs.tahoe.be',
                'tags' => '2021|other|javascript',
                'body' => 'the bodyè',
                'draft' => false
            ],
            [
                'title' => 'Wow that\'s a third post',
                'excerpt' => 'Create a list of your favorite dog breeds and share it with your friends.',
                'category_id' => 3,
                'slug' => 'myfavoritedfdfdsfdsogs',
                'likes' => 7,
                'external_url' => 'https://myfavoritedogs.tahoe.be',
                'tags' => '2023|tag|wow',
                'body' => 'the bodyè',
                'draft' => false
            ],
            [
                'title' => 'And a fourth',
                'excerpt' => 'Create a list of your favorite dog breeds and share it with your friends.',
                'category_id' => 4,
                'slug' => 'EEEEEE',
                'likes' => 2,
                'external_url' => 'https://myfavoritedogs.tahoe.be',
                'tags' => '2023|tag|wow',
                'body' => 'the bodyè',
                'draft' => false
            ]
        ]);
    }
}
