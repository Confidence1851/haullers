<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteCategory extends Model
{
    protected $fillable = ['state' , 'name'];

    public function routes(){
        return $this->bhaslongsTo(RouteCategory::class , "route_cat_id");
    }
}
