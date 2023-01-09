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
        Schema::create('perinatal_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->date('last_menstrual_cycle')->nullable();
            $table->date('cycle_time')->nullable();
            $table->string('contraceptive_method_use')->nullable();
            $table->string('assisted_conception')->nullable();
            $table->string('final_ppf')->nullable();
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
        Schema::dropIfExists('perinatal_backgrounds');
    }
};
