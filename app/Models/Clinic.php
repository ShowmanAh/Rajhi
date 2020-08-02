<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = ['name'];
    public function scopeSelection($query){
        return $query->select('id','name');
    }

    public function dates()
    {
        return $this->hasMany(Date::class, 'clinic_id');
    }

}
