<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name','age','role','batting','bowling','image','odiRuns','country_id'];
    public $timestamps = false;

    public function Country()
    {
        return $this->belongsTo('App\Country');
    }
}
