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
        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            //cascade here means if dragon is deleted so will the abilities
            $table->foreignID('dragon_id')->constrained()->onDelete('cascade');
            //cascade - if the user is deleted so are their abilities
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('name')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('abilities.show');
    }
};
