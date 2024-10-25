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
        Schema::create('couple_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('anh_chu_re')->nullable();
            $table->string('ten_chu_re')->nullable();
            $table->string('ten_chu_re_ngan_gon')->nullable();
            $table->string('ngay_sinh_chu_re')->nullable();
            $table->text('gioi_thieu_chu_re')->nullable();
            $table->string('ho_ten_bo_chu_re')->nullable();
            $table->string('ho_ten_me_chu_re')->nullable();
            $table->string('ten_ngan_hang_chu_re')->nullable();
            $table->string('ten_chu_tai_khoan_chu_re')->nullable();
            $table->string('stk_chu_re')->nullable();
            $table->string('chi_nhanh_chu_re')->nullable();
            $table->string('anh_qr_chu_re')->nullable();

            $table->string('anh_co_dau')->nullable();
            $table->string('ten_co_dau')->nullable();
            $table->string('ten_co_dau_ngan_gon')->nullable();
            $table->string('ngay_sinh_co_dau')->nullable();
            $table->text('gioi_thieu_co_dau')->nullable();
            $table->string('ho_ten_bo_co_dau')->nullable();
            $table->string('ho_ten_me_co_dau')->nullable();
            $table->string('ten_ngan_hang_co_dau')->nullable();
            $table->string('ten_chu_tai_khoan_co_dau')->nullable();
            $table->string('stk_co_dau')->nullable();
            $table->string('chi_nhanh_co_dau')->nullable();
            $table->string('anh_qr_co_dau')->nullable();

            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couple_informations');
    }
};
