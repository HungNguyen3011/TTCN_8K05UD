<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Đổi tên bảng Laravel mặc định thành tên trong báo cáo.
        Schema::rename('users', 'NGUOIDUNG');

        // Đổi tên các cột, giữ nguyên khóa chính và dữ liệu.
        Schema::table('NGUOIDUNG', function (Blueprint $table) {
            $table->renameColumn('id', 'MANGUOIDUNG');
            $table->renameColumn('name', 'HOTEN');
            $table->renameColumn('email', 'EMAIL');
            $table->renameColumn('password', 'MATKHAU');
            $table->renameColumn('created_at', 'NGAYTAO');
            $table->renameColumn('updated_at', 'NGAYCAPNHAT');
        });

        // Đưa độ dài và kiểu ngày giờ về thiết kế trong báo cáo.
        Schema::table('NGUOIDUNG', function (Blueprint $table) {
            $table->string('HOTEN', 100)->change();
            $table->string('EMAIL', 150)->change();
            $table->dateTime('NGAYTAO')->nullable()->change();
            $table->dateTime('NGAYCAPNHAT')->nullable()->change();
        });

        // Bỏ hai cột Laravel không thuộc schema V1 và thêm thông tin tài khoản.
        Schema::table('NGUOIDUNG', function (Blueprint $table) {
            $table->dropColumn(['email_verified_at', 'remember_token']);

            $table->string('ANHDAIDIEN', 255)->nullable();
            $table->string('VAITRO', 20)->default('member');
            $table->string('TRANGTHAI', 20)->default('active');
        });
    }

    public function down(): void
    {
        // Gỡ các trường được thêm trong up().
        Schema::table('NGUOIDUNG', function (Blueprint $table) {
            $table->dropColumn(['ANHDAIDIEN', 'VAITRO', 'TRANGTHAI']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token', 100)->nullable();
        });

        // Khôi phục tên cột Laravel mặc định.
        Schema::table('NGUOIDUNG', function (Blueprint $table) {
            $table->renameColumn('MANGUOIDUNG', 'id');
            $table->renameColumn('HOTEN', 'name');
            $table->renameColumn('EMAIL', 'email');
            $table->renameColumn('MATKHAU', 'password');
            $table->renameColumn('NGAYTAO', 'created_at');
            $table->renameColumn('NGAYCAPNHAT', 'updated_at');
        });

        // Khôi phục kiểu và độ dài ban đầu.
        Schema::table('NGUOIDUNG', function (Blueprint $table) {
            $table->string('name', 255)->change();
            $table->string('email', 255)->change();
            $table->timestamp('created_at')->nullable()->change();
            $table->timestamp('updated_at')->nullable()->change();
        });

        Schema::rename('NGUOIDUNG', 'users');
    }
};
