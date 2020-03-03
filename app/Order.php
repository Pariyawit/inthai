<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function orderItems(){
    	return $this->hasMany(OrderItem::class);
    }

    public function customer(){
    	return $this->hasOne(Customer::class);
    }
}
