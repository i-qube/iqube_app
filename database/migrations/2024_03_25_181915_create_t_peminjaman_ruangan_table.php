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
            $table->unsignedBigInteger('admin_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('room_id')->index();
            $table->string('user_name');
            $table->string('class');
            $table->string('admin_name');
            $table->dateTime('date_borrow');
            $table->dateTime('date_return');

            $table->foreign('admin_id')->references('admin_id')->on('m_admin');
            $table->foreign('user_id')->references('user_id')->on('m_user');
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
