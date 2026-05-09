<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Category::updateOrInsert(
            ['slug' => 'blog'],   // what identifies the row
            ['name' => 'Blog']    // what to update / insert
        );
    }
}
