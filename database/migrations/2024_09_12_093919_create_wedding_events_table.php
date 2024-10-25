<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('wedding_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('anh_su_kien_nam')->nullable();
            $table->string('ten_su_kien_nam')->nullable();
            $table->dateTime('thoi_gian_su_kien_nam')->nullable();
            $table->string('dia_chi_nam')->nullable();
            $table->text('map_nam')->nullable();

            $table->string('anh_su_kien_nu')->nullable();
            $table->string('ten_su_kien_nu')->nullable();
            $table->dateTime('thoi_gian_su_kien_nu')->nullable();
            $table->text('map_nu')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('wedding_events');
    }
};
