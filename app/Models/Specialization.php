<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = ['name'];

  
    public function subspecializations()
    {
        return $this->hasMany(Subspecialization::class, 'specialization_id', 'id');
    }
}
