<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->enum('gender', ['masculino', 'femenino'])->nullable();
            $table->date('birthday')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country_code')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('user_folder')->unique()->nullable();
            $table->json('profile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
