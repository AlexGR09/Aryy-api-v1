<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'full_name',
        'gender',
        'birthday',
        'email',
        'password',
        'country_code',
        'phone_number',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function physician()
    {
        return $this->hasOne(\App\Models\Physician::class);
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
}
