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
        Schema::create('user_badges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userID')->constrained('users', 'userID')->onDelete('cascade');
            $table->foreignId('badgeID')->constrained('badges', 'badgeID')->onDelete('cascade');
            $table->dateTime('earned_at');
            
            $table->unique(['userID', 'badgeID']); // Prevent duplicate badges
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_badges');
    }
};
