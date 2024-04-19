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
        Schema::create('m_room', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('room_code')->unique();
            $table->string('room_name');
            $table->string('room_floor');
            $table->longblob('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_room');
    }
};
