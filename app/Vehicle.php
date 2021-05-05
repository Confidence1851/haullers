<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded=[];

    public function routeCategory(){
        return $this->belongsTo(RouteCategory::class , "route_cat_id");
    }

    public function vehicleCategory(){
        return $this->belongsTo(VehicleCategory::class , "vehicle_cat_id");
    }

    
}
