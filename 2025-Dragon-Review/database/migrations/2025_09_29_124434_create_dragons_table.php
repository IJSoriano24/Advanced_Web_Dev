<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //This is the migration file to create the dragons table in the database.
    // It defines the schema for the table including columns for type, color, personality, image, video_id, created_at, and updated_at.
    public function up(): void
    {
        Schema::create('dragons', function (Blueprint $table) {
            $table->id(); //The ID column is the primary key and auto-incrementing.
            $table->string('type');
            $table->string('color');
            $table->string('personality');
            $table->string('image');
            $table->string('video_id')->nullable(); //video_id can be null
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dragons');
    }
};
