<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';
    protected $fillable = ['from','to','date_id'];
    public function dates() {
        return $this->belongsTo(Date::class, 'date_id');
    }
    public function getFromAttribute($value)
    {
        return date("h:i a" , strtotime($value));
    }

    public function getToAttribute($value)
    {
        return date("h:i a" , strtotime($value));
    }
}
