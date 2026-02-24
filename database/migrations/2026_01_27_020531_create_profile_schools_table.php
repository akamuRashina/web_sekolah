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
        Schema::create('profile_schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->text('description');
            $table->text('address');
            $table->string('principal_name');
            $table->string('principal_photo');
            $table->integer('number_of_students');
            $table->text('vision');
            $table->text('mission');
            $table->text('history');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_schools');
    }
};
