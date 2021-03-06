<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = ['name', 'city_id'];
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function centers()
    {
         return $this->hasMany(Center::class);
    }
    public function clinics()
    {
        return $this->hasMany(Clinic::class, 'area_id');
    }

}
