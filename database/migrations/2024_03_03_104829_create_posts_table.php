<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->string('slug');
            $table->string('thumbnail')->nullable();
            $table->string('title');
            $table->text('excerpt');
            $table->text('external_url')->nullable();
            $table->integer('likes')->nullable();
            $table->text('body');
            $table->timestamps();
            $table->string('tags');
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
