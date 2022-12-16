<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up()
    {
        Schema::create('physicians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('professional_name');
            $table->json('certificates')->nullable();
            $table->json('social_networks')->nullable();
            $table->string('biography')->nullable();
            $table->string('recipe_template')->nullable();
            $table->string('first_time_consultation')->nullable();
            $table->string('subsequent_consultation')->nullable();
            $table->string('languages')->nullable();
            $table->enum('is_verified', ['not_verified', 'in_verification', 'verified'])->default('not_verified');
            $table->string('physician_profile_photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('physicians');
    }
};
