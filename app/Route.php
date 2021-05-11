<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['route_cat_id' , 'start' , 'end' , 'price'];

    public function routeCategory(){
        return $this->belongsTo(RouteCategory::class , "route_cat_id");
    }
}
