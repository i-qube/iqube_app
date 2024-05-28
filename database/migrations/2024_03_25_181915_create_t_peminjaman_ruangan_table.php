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
            $table->string('nim');
            $table->unsignedBigInteger('room_id');
            $table->dateTime('date_borrow');
            $table->dateTime('date_return')->nullable();
            $table->string('status')->default('Not Complete');
            $table->timestamps();
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
