<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'vehicle_id',	'route_id',	'payment_id','user_id' , 'contact_id', 'status','user_id','order_contact_id'
    ];
}
