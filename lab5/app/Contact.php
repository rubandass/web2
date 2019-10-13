<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //state here which fields you are allowed to fill from a form
    protected $fillable = ['firstName','lastName','phone'];
    public $timestamps = false;
}
