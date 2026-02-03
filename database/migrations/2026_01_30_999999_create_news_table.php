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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->date('upload_date');
            $table->enum('status', ['draf', 'upload'])->default('draf');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            $table->foreignId('category_id')
                  ->references('category_id')
                  ->on('categories')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
