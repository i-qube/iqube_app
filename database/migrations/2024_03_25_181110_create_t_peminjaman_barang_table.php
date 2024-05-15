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
            $table->unsignedBigInteger('nim')->index();
            $table->unsignedBigInteger('item_id')->index();
            $table->unsignedBigInteger('jumlah');
            $table->dateTime('date_borrow');
            $table->foreign('nim')->references('nim')->on('m_user');
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