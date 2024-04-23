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
<<<<<<< HEAD
            $table->string('img');
=======
            $table->longblob('image');
>>>>>>> b00c3139441821b5a5b42d58ed7fc9a9192c8ddd
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
