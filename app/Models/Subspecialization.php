<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subspecialization extends Model
{
   protected $fillable = ['name', 'specialization_id'];

   public function specialization()
   {
       return $this->belongsTo(Specialization::class);
   }
   public function doctor()
   {
       return $this->belongsToMany(Doctor::class);
   }

}
