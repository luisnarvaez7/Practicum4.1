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
         // Rooms table
         Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number');
            $table->enum('type', ['consultation', 'surgery', 'recovery', 'intensive care', 'emergency', 'laboratory'])->default('consultation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
