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
        Schema::create('t_peminjaman_ruangan', function (Blueprint $table) {
            $table->id('peminjaman_ruangan_id');
            $table->unsignedBigInteger('nim')->index();
            $table->string('nama');
            $table->unsignedBigInteger('room_id')->index();
            $table->string('class');
            $table->dateTime('date_borrow');
            $table->dateTime('date_return');
            $table->string('status')->default('Not Complete'); 
            
            $table->foreign('nim')->references('nim')->on('m_user');
            $table->foreign('room_id')->references('room_id')->on('m_room');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_peminjaman_ruangan');
    }
};
