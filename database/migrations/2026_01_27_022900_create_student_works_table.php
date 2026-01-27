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
        Schema::create('student_works', function (Blueprint $table) {
            $table->id();
            $table->string('title_of_work');
            $table->string('description');
            $table->string('file_of_work');
            $table->foreignId('id_major')->constrained()->onDelete('casade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_works');
    }
};
