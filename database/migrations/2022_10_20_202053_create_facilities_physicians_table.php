<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities_physicians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
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
        Schema::dropIfExists('facilities_physicians');
    }
};
