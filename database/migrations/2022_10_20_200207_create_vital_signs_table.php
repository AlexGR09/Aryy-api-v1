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
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->double('temperature')->nullable();
            $table->double('weight')->nullable();
            $table->integer('breathing_frecuncy')->nullable();
            $table->integer('systolic_pressure')->nullable();
            $table->integer('diasystolic_pressure')->nullable();
            $table->integer('heart_rate')->nullable();
            $table->integer('oxygen_saturation')->nullable();
            $table->integer('body_mass')->nullable();
            $table->integer('body_fat')->nullable();
            $table->double('weight_loss')->nullable();
            $table->integer('fat')->nullable();
            $table->double('waist')->nullable();
            $table->integer('water')->nullable();
            $table->integer('muscle')->nullable();
            $table->integer('abdomen')->nullable();
            $table->foreignId('patient_id')->constrained();
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
        Schema::dropIfExists('vital_signs');
    }
};
