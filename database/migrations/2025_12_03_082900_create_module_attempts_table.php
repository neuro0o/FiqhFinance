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
        Schema::create('module_attempts', function (Blueprint $table) {
            $table->id('attemptID');
            $table->foreignId('userID')->constrained('users', 'userID')->onDelete('cascade');
            $table->integer('moduleID');
            $table->integer('score');
            $table->dateTime('attempted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_attempts');
    }
};
