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
        Schema::create('blog_mengapa_smks', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('title');
            $table->string('slug');
            $table->text('image_header')->nullable();
            $table->text('konten');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_mengapa_smks');
    }
};
