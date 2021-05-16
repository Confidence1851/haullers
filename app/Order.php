<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'vehicle_id','route_id','payment_id','user_id' , 'contact_id', 'status','user_id','order_contact_id',
        'price'
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class , "vehicle_id");
    }

    public function user(){
        return $this->belongsTo(User::class , "user_id");
    }

    public function contact(){
        return $this->belongsTo(OrderContact::class , "order_contact_id");
    }

    public function route(){
        return $this->belongsTo(Route::class , "route_id");
    }

    public function payment(){
        return $this->belongsTo(Payment::class , "payment_id");
    }


}
