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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description')->nullable();
            $table->string('tag')->nullable();
            $table->string('category')->nullable();
            $table->string('author')->index()->nullable();
            $table->text('body')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedInteger('views')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedSmallInteger('status')->nullable();
            $table->timestamps();

            $table->unique(['author', 'title']);
            $table->index(['published_at', 'author']);
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
