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
<<<<<<<< HEAD:database/migrations/2026_01_30_999999_create_news_table.php
            $table->date('upload_date');
========
               $table->date('upload_date');
>>>>>>>> 173c981f107e88a7657021bbd0075e2252aee863:database/migrations/2026_01_30_041018_create_news_table.php
            $table->enum('status', ['draf', 'upload'])->default('draf');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

<<<<<<<< HEAD:database/migrations/2026_01_30_999999_create_news_table.php
            $table->foreignId('category_id')
========
            $table->foreign('category_id')
>>>>>>>> 173c981f107e88a7657021bbd0075e2252aee863:database/migrations/2026_01_30_041018_create_news_table.php
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
