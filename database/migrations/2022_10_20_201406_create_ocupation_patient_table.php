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
        Schema::create('ocupation_patient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ocupations_id');
            $table->foreign('ocupations_id')->references('id')->on('ocupations')->onDelete('cascade');
            $table->unsignedBigInteger('patients_id');
            $table->foreign('patients_id')->references('id')->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('ocupation_patient');
    }
};
