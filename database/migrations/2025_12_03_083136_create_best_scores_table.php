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
        Schema::create('best_scores', function (Blueprint $table) {
            $table->id('scoreID');
            $table->foreignId('userID')->constrained('users', 'userID')->onDelete('cascade');
            $table->integer('moduleID');
            $table->integer('bestScore');
            $table->dateTime('scored_at');

            $table->unique(['userID', 'moduleID']);  // prevents duplicates
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_scores');
    }
};
