<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('medical_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('physician_id')->constrained('physicians');
            $table->foreignId('facility_id')->constrained('facilities');
            $table->foreignId('prescription_id')->nullable()->constrained('prescriptions');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->time('appointment_time_end');
            $table->string('appointment_type');
            $table->enum('status', ['assisted', 'not-assisted', 'cancelled', 'scheduled','confirmed']);
            $table->string('note')->nullable();
            $table->enum('relationship',['Abuela / Abuelo','Madre / Padre','Hermana / Hermano','Esposa / Esposo','Hija / Hijo','Amigo / Amigo']);
            $table->decimal('cost')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_appointments');
    }
};
