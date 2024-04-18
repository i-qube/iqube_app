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
        Schema::create('m_item', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('item_name');
            $table->string('brand');
            $table->integer('item_qty');
            $table->dateTime('date_received');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_item');
    }
};
