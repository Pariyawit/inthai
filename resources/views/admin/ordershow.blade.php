@extends('layouts.admin')

@section('admin-content')

<div class="container">
  {{-- <h3 class="mt-3">Order</h3> --}}
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="card">
        <div class="card-body">
          {{-- <span class="float-right status status--{{ $order->status}}">{{ $order->status}}</span> --}}
          <order-status-change class="float-right" order_id="{{$order->id}}" order_status="{{$order->status}}"></order-status-change>
          <div class="card-title">
            <h3>Order #{{$order->id}}<h3>
          </div>
          <p>
            Ordered Time: {{ date('d/m/y h:i A', strtotime($order->created_at)) }} <br>
            Requested Delivery Time: {{ date('d/m/y h:i A', strtotime($order->delivery_time)) }}
          </p>
          <table class="table table-sm">
            <thead>
              <tr>
                <th>Name</th>
                <th class="text-right">Price</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Total Price</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->orderItems as $item)
              <tr>
                <td>{{ $item->item->title}}</td>
                <td class="text-right">{{ $item->item->price }}</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">{{ number_format($item->quantity * $item->item->price, 2) }}</td>
              </tr>
              @endforeach
              <tr class="table-info">
                <td></td>
                <td></td>
                <td class="text-right"><strong>TOTAL</strong></td>
                <td class="text-right"><strong> ${{ number_format($order->total, 2) }}</strong></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h3>Delivery Detail<h3>
          </div>
          <strong>Name</strong>
          <p>{{ $order->customer->name }}</p>
          <strong>Mobile</strong>
          <p>{{ $order->customer->mobile }}</p>
          <strong>Address</strong>
          <p>{{ $order->customer->address }}
            <br>
            {{ $order->customer->address2 }}
          </p>
          <strong>Town/Suburb</strong>
          <p>{{ $order->customer->suburb }}</p>
          <strong>Postcode</strong>
          <p>{{ $order->customer->postcode }}</p>
          <div>
            <h5>Note</h5>
            <textarea name="" id="" cols="30" rows="5" class="w-100" disabled="">{{ $order->note }}</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection