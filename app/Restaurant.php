<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
   	protected $guarded = [];

   	public function items(){
   		return $this->hasMany(Item::class)->orderBy('created_at');
   	}

   	public function categories(){
   		return $this->hasMany(Category::class)->orderBy('created_at');
   	}
}
