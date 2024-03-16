<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Category::insert([
            [
                'name' => 'Browser extension',
                'slug' => 'browser_extension'
            ],
            [
                'name' => 'Web app',
                'slug' => 'web_app'
            ],
            [
                'name' => 'Minecraft mod',
                'slug' => 'minecraft_mod'
            ],
            [
                'name' => 'Blog post',
                'slug' => 'blog_post'
            ],
            [
                'name' => 'WordPress extension',
                'slug' => 'wordpress_extension'
            ],
            [
                'name' => 'Client work',
                'slug' => 'client_work'
            ],
            [
                'name' => 'Graphic design',
                'slug' => 'graphic_design'
            ]
        ]);
    }
}
