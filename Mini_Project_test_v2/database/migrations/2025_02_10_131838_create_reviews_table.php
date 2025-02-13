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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('hike_id')->constrained('hikes')->onDelete('cascade'); // The article the comment belongs to
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // The user who made the comment
            $table->text('content');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
