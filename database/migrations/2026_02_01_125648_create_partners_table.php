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
    Schema::create('partners', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('field')->nullable();
        $table->text('address')->nullable();
        $table->string('phone')->nullable();
        $table->string('email');
        $table->text('description')->nullable();
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();
    });
}

};
