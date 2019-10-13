<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $fillable = ['name', 'date_of_birth','breed_id'];

    public function breed()
    {
        return $this->belongsTo('App\Breed');
    }
}
