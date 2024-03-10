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
            $table->string('title');
            $table->string('slug');
            $table->foreignId('category_id')->nullable();
            $table->string('tags');
            $table->text('body');
            $table->date('date')->default(now()->toDateString());
            $table->string('thumbnail')->nullable();
            $table->text('excerpt');
            $table->text('external_url')->nullable();
            $table->integer('likes')->nullable();
            $table->boolean('draft')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
