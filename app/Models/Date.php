<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'dates';
    protected $fillable = ['days', 'doctor_id', 'clinic_id'];

    public function doctors()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function clinics()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    public function setDaysAttribute($arr){
        $this->attributes['days'] = join(',', $arr);
    }
    public function getDaysAttribute($days){
        return explode(',', $days);
    }
}
