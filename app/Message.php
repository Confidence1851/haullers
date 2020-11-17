<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=[
    'user_id',	'reference_id',	'payment_id'	,'order_id'	,'message',	'user_type',	'type'
    ];
}

