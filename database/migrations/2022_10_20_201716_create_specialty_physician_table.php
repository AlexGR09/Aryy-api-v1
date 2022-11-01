<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
   
    public function up()
    {
        Schema::create('specialty_physician', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('specialty_id');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
            $table->unsignedBigInteger('physician_id');
            $table->foreign('physician_id')->references('id')->on('physicians')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialty_physician');
    }
};
