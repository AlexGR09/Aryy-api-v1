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
        Schema::create('pyschological_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('family_history')->nullable();
            $table->string('disease_awareness')->nullable();
            $table->string('areas_affected_by_the_disease')->nullable();
            $table->string('family_support_group')->nullable();
            $table->string('family_group_of_the_patient')->nullable();
            $table->string('aspects_of_social_life')->nullable();
            $table->string('aspects_of_working_life')->nullable();
            $table->string('relationship_whit_authority')->nullable();
            $table->string('inpulse_control')->nullable();
            $table->string('frustration_management')->nullable();
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
        Schema::dropIfExists('pyschological_backgrounds');
    }
};
