<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Category::where('slug', 'blog_post')->update([
            'name' => 'News',
            'slug' => 'news',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
