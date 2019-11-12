<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['name','owner_id'];
    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
