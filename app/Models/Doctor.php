<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

   protected $fillable = ['name', 'email','password', 'gender', 'title', 'about', 'specialization_id', 'image'];

   public function services(){
       return $this->hasMany(Service::class);
   }
   public function specialization(){
       return $this->belongsTo(Specialization::class);
   }

   public function insurance_companies()
   {
       return $this->belongsToMany(InsuranceCompany::class);
   }
   public function subspecializations()
   {
       return $this->belongsToMany(Subspecialization::class);
   }
   public function getgender(){
       return $this->gender;
   }
   public function getimageAttribute($val){
    return ($val !== null) ? asset('assets/' . $val) : '';
}
}
