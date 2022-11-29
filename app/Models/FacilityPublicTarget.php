<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilityPublicTarget extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'facility_public_target';
}
