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
        Schema::create('danhmuc', function (Blueprint $table) {
            $table->increments('MADANHMUC');
            $table->string('TENDANHMUC', 100)->unique();
            $table->text('MOTA')->nullable();
            $table->datetime('NGAYTAO')->nullable();
            $table->datetime('NGAYCAPNHAT')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhmuc');
    }
};
