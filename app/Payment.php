<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',	'order_contact_id',	'payment_ref_no',	'price',	'status',	'date'	
    ];

    public function status(){
        return $this->status == 0  ? "Pending" : "Completed";
    }

    
}
