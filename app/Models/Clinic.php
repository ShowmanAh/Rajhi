<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $table = 'clinics';
    protected $fillable = ['name', 'area_id','address','latitude','longitude', 'waiting_time','type','phone','center_id','doctor_id'];
    public $timestamps = true;
    public function scopeSelection($query){
        return $query->select('id','name');
    }

    public function dates()
    {
        return $this->hasMany(Date::class, 'clinic_id');
    }

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

   public function centers()
   {
       return $this->belongsTo(Center::class, 'center_id');
   }

   public function doctors()
   {
       return $this->belongsTo(Doctor::class, 'doctor_id');
   }




}
