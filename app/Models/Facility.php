<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        'phone',
        'extension',
        'zipcode',
        'schedule',
        'type_schedule',
        'consultation_length',
        'accessibility_and_others',
        'city_id',
        'coordinates',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'location' => 'object',
        'schedule' => 'object',
        'accessibility_and_others' => 'object',
    ];

    protected $hidden = ['pivot'];

    public function checkValidDate($date, $time)
    {
        $date = Carbon::parse($date);
        $time = Carbon::parse($time);
        $week = $this->schedule->week;
        foreach ($week as $key => $availableDate) {
            if ($availableDate->day == $date->format('l')) {
                $hours = explode(' a ', $availableDate->attention_time);
                $restHours = explode(' a ', $availableDate->rest_hours);

                $restStartHour = Carbon::parse($restHours[0]);
                $restEndtHour = Carbon::parse($restHours[1]);

                $startHour = Carbon::parse($hours[0]);
                $endHour = Carbon::parse($hours[1]);
                
                if(
                    $time->format('l') >= $startHour->format('l') && 
                    $time->format('l') <= $endHour->format('l') && 
                    !($time >=  $restStartHour && $time <= $restEndtHour)
                ){
                    if(!in_array($date->toDateString(),$this->schedule->free_days)){
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function physicians()
    {
        return $this->belongsToMany(\App\Models\Physician::class, 'facility_physician');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    // RELACIÓN UNO A MUCHOS CON LA TABLA MEDICAL APPOINTMENTS
    public function medical_appointments()
    {
        return $this->hasMany(MedicalAppointment::class);
    }
}
