<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = 'centers';
    protected $fillable = ['name', 'email', 'password', 'logo', 'address', 'about','city_id', 'area_id'];

    public function getlogoAttribute($val){
        return ($val !== null) ? asset('assets/' . $val) : '';
    }


   public function city()
   {
       return $this->belongsTo(City::class, 'city_id');
   }
   public function areas()
   {
       return $this->belongsTo(Area::class, 'area_id');
   }


}
