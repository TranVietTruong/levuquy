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
        Schema::create('su_kien_cuoi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('anh')->nullable();
            $table->string('ten_su_kien')->nullable();
            $table->string('thoi_gian')->nullable();
            $table->string('dia_chi')->nullable();
            $table->text('map')->nullable();
            $table->int('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('su_kien_cuoi');
    }
};
