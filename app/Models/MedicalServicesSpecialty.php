<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class MedicalServicesSpecialty extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'specialty_id',
        'medical_service_id',
    ];

    public function specialty(){
        return $this->HasMany(Specialty::class,'id','specialty_id');
    }
    public function medicalServices(){
        return $this->HasMany(MedicalService::class,'id','medical_service_id');
    }
}
