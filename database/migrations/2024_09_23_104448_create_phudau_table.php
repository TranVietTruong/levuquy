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
        Schema::create('phudau', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('anh_phu_re')->nullable();
            $table->string('ten_phu_re')->nullable();
            $table->text('gioi_thieu_phu_re')->nullable();

            $table->string('anh_phu_dau')->nullable();
            $table->string('ten_phu_dau')->nullable();
            $table->text('gioi_thieu_phu_dau')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phudau');
    }
};
