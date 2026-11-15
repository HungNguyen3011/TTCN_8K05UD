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
        Schema::create('congthuc', function (Blueprint $table) {
            $table->increments('MACONGTHUC');

            //người đăng, danh mục
            $table->unsignedBigInteger('MANGUOIDUNG');
            $table->unsignedInteger('MADANHMUC');

            //admin
            $table->unsignedBigInteger('NGUOIDUYET')->nullable();

            $table->string('TENCONGTHUC',200);
            $table->text('MOTA')->nullable();
            $table->unsignedInteger('THOIGIANNAU');
            $table->string('DOKHO', 20);
            $table->string('HINHANH', 255)->nullable();

            $table->string ('TRANGTHAI', 20)->default('Chờ duyệt');
            $table->datetime('NGAYDUYET')->nullable();
            $table->text('LYDOTUCHOI')->nullable();

            $table->datetime('NGAYTAO')->nullable();
            $table->datetime('NGAYCAPNHAT')->nullable();

            $table->foreign('MANGUOIDUNG')->references('MANGUOIDUNG')->on('nguoidung')->RestrictOnDelete();
            $table->foreign('MADANHMUC')->references('MADANHMUC')->on('danhmuc')->RestrictOnDelete();
            $table->foreign('NGUOIDUYET')->references('MANGUOIDUNG')->on('nguoidung')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('congthuc');
    }
};
