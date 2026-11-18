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
        Schema::create('buocchebien', function (Blueprint $table) {
            $table->increments('MABUOC');
            $table->unsignedInteger('MACONGTHUC');
            $table->integer('THUTU');
            $table->text('NOIDUNG');

            $table->foreign('MACONGTHUC')->references('MACONGTHUC')->on('congthuc')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buocchebien');
    }
};
