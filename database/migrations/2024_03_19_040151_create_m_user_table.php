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
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('no_induk')->unique();
            $table->unsignedBigInteger('level_id')->index();
            $table->string('nama');
            $table->string('jurusan');
            $table->string('angkatan');
            $table->string('kelas');
            $table->string('password');
            $table->timestamps();
            $table->foreign('level_id')->references('level_id')->on('m_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
