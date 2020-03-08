<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Customer;
use Carbon\Carbon;

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
          'orderRequest.orders' => 'required',
          'orderRequest.note' => '',
          'orderRequest.total'  => 'required',
          'deliveryRequest.name' => 'required',
          'deliveryRequest.mobile' => 'required',
          'deliveryRequest.address' => 'required',
          'deliveryRequest.address2' => '',
          'deliveryRequest.suburb' => 'required',
          'deliveryRequest.state' => 'required',
          'deliveryRequest.postcode' => 'required',
          'timeRequest.time' => 'required',
        ]);
        // return $data;
        
        $orderRequest = $data['orderRequest'];
        $timeRequest = $data['timeRequest'];
        $deliveryRequest = $data['deliveryRequest'];

        $order = new Order;
        $order['total'] = $orderRequest['total'];
        $order['note'] = $orderRequest['note'];
        $order['delivery_time'] = Carbon::createFromTimestamp($timeRequest['time']);
        $order['status'] = 'new';

        $order->save();
        foreach ($orderRequest['orders'] as $o) {
            $order->orderItems()->save(new OrderItem($o));
        }

        $order->customer()->save(new Customer($deliveryRequest));

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
