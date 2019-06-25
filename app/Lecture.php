<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    public function hasGrade(){
        return $this->hasOne('App\Grade','lecture_id','id');
    }
}