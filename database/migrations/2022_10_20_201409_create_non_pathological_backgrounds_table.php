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
        Schema::create('non_pathological_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->json('physical_activity')->nullable();
            $table->json('rest_time')->nullable();
            $table->json('smoking')->nullable();
            $table->json('alcoholim')->nullable();
            $table->string('other_substances')->nullable();
            $table->string('diet')->nullable();
            $table->string('current_medication')->nullable();
            $table->string('previous_medication')->nullable();
            $table->string('drug_active')->nullable();
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
        Schema::dropIfExists('non_pathological_backgrounds');
    }
};