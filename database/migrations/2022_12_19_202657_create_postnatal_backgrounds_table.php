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
        Schema::create('postnatal_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_details')->nullable();
            $table->string('baby_name')->nullable();
            $table->string('baby_weight')->nullable();
            $table->string('baby_health')->nullable();
            $table->string('type_of_feeding')->nullable();
            $table->string('emotonial_state')->nullable();
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
        Schema::dropIfExists('postnatal_backgrounds');
    }
};
