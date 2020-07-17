<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    protected $table = 'insurance_companies';
    protected $fillable = ['name'];

    
    public function doctor()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
