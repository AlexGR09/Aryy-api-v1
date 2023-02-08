<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'id',
        'email',
        'password',
        'country_code',
        'phone_number',
        'user_folder',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'pm_last_four',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function physician()
    {
        return $this->hasOne(\App\Models\Physician::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    // RELACIÓN UNO A MUCHOS CON EL MODELO PATIENT
    public function patients()
    {
        return $this->hasMany(\App\Models\Patient::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function taxdata()
    {
        return $this->hasOne('App\Models\TaxData');
    }

    public function userSubscription()
    {
        return $this->belongsToMany(Plan::class, 'subscriptions', 'user_id', 'plan_id');
    }
}
