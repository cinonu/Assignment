<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
     protected $fillable = [
        'firstname', 'lastname','email','phonenumber','city','gender','image'
,'status'    ];
}
