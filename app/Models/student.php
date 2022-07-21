<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table='students';
    protected $primarykey='id';

    function student_data(){
        return $this->hasOne(address::class);
    }

    function city_data(){
        return $this->hasOne(city::class);
    }

}
