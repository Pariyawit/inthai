<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AdminController extends Controller
{
    public function main(){
      $orders = Order::orderBy('delivery_time','asc')->orderBy('created_at','desc')->get();
      return view('admin.main', compact('orders'));
    }
}
