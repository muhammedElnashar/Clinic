<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded =[];
    public function prescription()
    {
        return $this->hasMany(Prescription::class,'patient_id');
    }

    public function detection()
    {
        return $this->hasMany(Detection::class,'patient_id');
    }

}

