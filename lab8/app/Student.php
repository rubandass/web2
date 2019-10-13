<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
