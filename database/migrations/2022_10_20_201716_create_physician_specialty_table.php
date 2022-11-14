<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
   
    public function up()
    {
        Schema::create('physician_specialty', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialty_id')->onDelete('set null')->constrained('specialties');
            $table->foreignId('physician_id')->nullable()->constrained('physicians');
            $table->string('license')->unique();
            $table->string('institution');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('physician_specialty');
    }
};
