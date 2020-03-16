<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }

    public function items(){
   		return $this->hasMany(Item::class)->orderBy('id');
   	}
}
