<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        return view('order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'orders' => 'required',
            'note'  => ''
        ]);
        $order = new Order;
        $order->note = $data['note'];
        $order->status = 'ordering';
        $order->save();

        foreach ($data['orders'] as $o) {
            $orderItem = new OrderItem;
            $orderItem['item_id'] = $o['item_id'];
            $orderItem['quantity'] = $o['quantity'];
            $order->orderItems()->save($orderItem);
        }

        return $order->id;
    }

    public function confirm(Order $order){
        $totalPrice = 0;
        foreach ($order->orderItems as $item) {
            $totalPrice += $item->quantity * $item->item->price;
        }
        return view('order.confirm', compact('order','totalPrice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $totalPrice = 0;
        foreach ($order->orderItems as $item) {
            $totalPrice += $item->quantity * $item->item->price;
        }
        return view('order.show', compact('order', 'totalPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
