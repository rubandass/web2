<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['name'];

    public function dogs()
    {
        return $this->hasMany('App\Dog');
    }
}
