<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderContact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone' , 'phone2' , 
    ];
}
