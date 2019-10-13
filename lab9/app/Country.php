<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','flag'];
    public $timestamps = false;

    public function players()
    {
        return $this->hasMany('App\Player');
    }
}
