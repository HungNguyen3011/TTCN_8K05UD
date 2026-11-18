<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nguyenlieu', function (Blueprint $table) {
            $table->unique('TENGUYENLIEU', 'nguyenlieu_ten_unique');
        });

        Schema::table('congthuc_nguyenlieu', function (Blueprint $table) {
            $table->string('SOLUONG', 50)->nullable()->change();
            $table->string('DONVI', 30)->nullable()->change();
            $table->unique(['MACONGTHUC', 'MANGUYENLIEU'], 'ctnl_pair_unique');
        });

        Schema::table('buocchebien', function (Blueprint $table) {
            $table->unique(['MACONGTHUC', 'THUTU'], 'buoc_recipe_order_unique');
        });

        Schema::table('danhgia', function (Blueprint $table) {
            $table->unique(['MANGUOIDUNG', 'MACONGTHUC'], 'danhgia_user_recipe_unique');
        });

        DB::statement('ALTER TABLE danhgia ADD CONSTRAINT danhgia_sodiem_1_5_check CHECK (SODIEM BETWEEN 1 AND 5)');

        Schema::table('yeuthich', function (Blueprint $table) {
            $table->unique(['MANGUOIDUNG', 'MACONGTHUC'], 'yeuthich_user_recipe_unique');
        });
    }

    public function down(): void
    {
        Schema::table('yeuthich', function (Blueprint $table) {
            $table->dropUnique('yeuthich_user_recipe_unique');
        });

        DB::statement('ALTER TABLE danhgia DROP CHECK danhgia_sodiem_1_5_check');

        Schema::table('danhgia', function (Blueprint $table) {
            $table->dropUnique('danhgia_user_recipe_unique');
        });

        Schema::table('buocchebien', function (Blueprint $table) {
            $table->dropUnique('buoc_recipe_order_unique');
        });

        Schema::table('congthuc_nguyenlieu', function (Blueprint $table) {
            $table->dropUnique('ctnl_pair_unique');
            $table->string('SOLUONG', 50)->nullable(false)->change();
            $table->string('DONVI', 30)->nullable(false)->change();
        });

        Schema::table('nguyenlieu', function (Blueprint $table) {
            $table->dropUnique('nguyenlieu_ten_unique');
        });
    }
};
