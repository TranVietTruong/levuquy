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
        Schema::create('website_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('template_id')->nullable();
            $table->string('anh_website')->nullable();
            $table->string('nhac_website')->nullable();
            $table->string('ten_website')->nullable();
            $table->string('mo_ta_website')->nullable();
            $table->string('ngay_cuoi')->nullable();
            $table->string('video_cuoi')->nullable();
            $table->string('id_video_cuoi')->nullable();
            $table->tinyInteger('cau_chuyen_tinh_yeu')->default(1);
            $table->tinyInteger('su_kien_cuoi')->default(1);
            $table->tinyInteger('phu_dau_phu_re')->default(1);
            $table->tinyInteger('album')->default(1);
            $table->tinyInteger('loi_cam_ta')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websíte_informations');
    }
};
