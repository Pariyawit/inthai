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
  public static function boot() {
    parent::boot();

    static::deleting(function($category) { // before delete() method call this
      $category->items()->each(function($item){
        $item->delete();
      });
    });
  }
}
