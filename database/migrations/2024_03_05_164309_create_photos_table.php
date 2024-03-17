<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->uuid('uuid');
            $table->string('thumbnail');
            $table->string('width');
            $table->string('height');
            $table->string('info')->nullable();
            $table->integer('likes')->nullable();
            $table->date('date')->default(now()->toDateString());
            $table->boolean('draft')->default(true);
            $table->boolean('cope')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('photos');
    }
};
