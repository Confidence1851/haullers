<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['route_cat_id' , 'start' , 'end' , 'price'];
}
