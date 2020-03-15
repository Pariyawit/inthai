<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Category;

class AdminController extends Controller
{
    public function main(){
      $page = 'main';
      $orders = Order::orderBy('delivery_time','asc')->orderBy('created_at','desc')->get();
      return view('admin.main', compact('page','orders'));
    }

    public function item(){
      $page = 'item';
      
      $categories = Category::All();
      foreach ($categories as $category) {
          $category["items"] = $category->items;
      }

      return view('admin.item', compact('page','categories'));
    }
}
