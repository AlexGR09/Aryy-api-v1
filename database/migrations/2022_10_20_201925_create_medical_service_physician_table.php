<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_service_physician', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medical_service_id');
            $table->foreign('medical_service_id')->references('id')->on('medical_services')->onDelete('cascade');
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
        Schema::dropIfExists('medical_service_physician');
    }
};
