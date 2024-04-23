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
        Schema::create('t_peminjaman_barang', function (Blueprint $table) {
            $table->id('peminjaman_barang_id');
            $table->unsignedBigInteger('admin_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('item_id')->index();
            $table->string('user_name');
            $table->string('class');
            $table->unsignedBigInteger('jumlah');
            $table->dateTime('date_borrow');
            $table->foreign('admin_id')->references('admin_id')->on('m_admin');
            $table->foreign('user_id')->references('user_id')->on('m_user');
            $table->foreign('item_id')->references('item_id')->on('m_item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_peminjaman_barang');
    }
};