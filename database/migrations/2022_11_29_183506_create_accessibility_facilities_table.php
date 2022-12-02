<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('accessibility_facility', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accessibility_id')->constrained('accessibilities');
            $table->foreignId('facility_id')->constrained('facilities');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accessibility_facility');
    }
};
