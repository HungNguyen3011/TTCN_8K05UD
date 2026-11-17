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
        Schema::create('congthuc_nguyenlieu', function (Blueprint $table) {
            $table->increments('MACONGTHUC_NGUYENLIEU');

            $table->unsignedInteger('MACONGTHUC');
            $table->unsignedInteger('MANGUYENLIEU');

            $table->string('SOLUONG', 50);
            $table->string('DONVI', 30);
            $table->string('GHICHU', 255)->nullable();
            $table->foreign('MACONGTHUC')->references('MACONGTHUC')->on('congthuc')->restrictOnDelete();
            $table->foreign('MANGUYENLIEU')->references('MANGUYENLIEU')->on('nguyenlieu')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('congthuc_nguyenlieu');
    }
};
