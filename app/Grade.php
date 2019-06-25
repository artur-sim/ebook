<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    function relations(){
            return $this->belongsToMany('App\Student','lectures');
    }
    

}