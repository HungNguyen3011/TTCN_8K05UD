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
        Schema::create('yeuthich', function (Blueprint $table) {
            $table->increments('MAYEUTHICH');
            $table->unsignedInteger('MACONGTHUC');
            $table->unsignedBigInteger('MANGUOIDUNG');
            $table->datetime('NGAYTAO')->nullable();

            $table->foreign('MACONGTHUC')->references('MACONGTHUC')->on('congthuc')->restrictOnDelete();
            $table->foreign('MANGUOIDUNG')->references('MANGUOIDUNG')->on('nguoidung')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yeuthich');
    }
};
