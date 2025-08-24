<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->boolean('repost')->default(false);
            $table->unsignedBigInteger('answer')->nullable()->index();
            $table->string('author')->nullable();
            $table->text('body');
            $table->unsignedBigInteger('chat')->index();
            $table->timestamps();

            $table->foreign('chat')->references('id')->on('chats')->onDelete('cascade');
            $table->foreign('answer')->references('id')->on('messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
