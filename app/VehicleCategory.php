<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    protected $guarded=[];

    public function vehicles(){
        return $this->hasMany(Vehicle::class , "vehicle_cat_id");
    }
}
