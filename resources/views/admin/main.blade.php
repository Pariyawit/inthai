@extends('layouts.admin')

@section('admin-content')

<div class="container">
  <h3 class="mt-3">New</h3>
  <ul class="list">
    <li class="list__item list__item--head">
      <div class="row">
        <div class="list__field col-2 col-md-1"><strong>#</strong></div>
        <div class="list__field col-3 col-md-2 text-center">Status</div>
        <div class="list__field d-none d-md-block col-3">Name</div>
        <div class="list__field d-none d-md-block col-2">Location</div>
        <div class="list__field col-3 col-md-1 text-center">Delivery</div>
        <div class="list__field col-4 col-md-1 text-right">Total</div>
        <div class="list__field d-none d-md-block col-2 text-right">Ordered Time</div>
      </div>
    </li>

    @foreach ($orders as $order)
    <a href="/admin/orders/{{$order->id}}" target="_blank">
      <li class="list__item">

        <div class="row">
          <div class="list__field col-2 col-md-1"><strong>{{$order->id}}</strong></div>
          <div class="list__field col-3 col-md-2 text-center"><span class="list__field status status--{{ $order->status}}">{{ $order->status}}</span></div>
          <div class="list__field d-none d-md-block col-3">{{$order->customer->name}}</div>
          <div class="list__field d-none d-md-block col-2">{{$order->customer->suburb}}, {{$order->customer->state}}</div>
          <div class="list__field col-3 col-md-1 text-center">{{ date('h:i A', strtotime($order->delivery_time)) }}</div>
          <div class="list__field col-4 col-md-1 text-right">${{$order->total}}</div>
          <div class="list__field d-none d-md-block col-2 text-right">{{ date('d/m/y h:i A', strtotime($order->created_at)) }}</div>
        </div>

      </li>
    </a>
    @endforeach

    <li class="list__item">
      <div class="row">
        <div class="list__field col-2 col-md-1"><strong>0</strong></div>
        <div class="list__field col-3 col-md-2 text-center"><span class="list__field status status--new">New</span></div>
        <div class="list__field d-none d-md-block col-3">Example 1</div>
        <div class="list__field d-none d-md-block col-2">Sydney, NSW</div>
        <div class="list__field col-3 col-md-1 text-center">10:30 PM</div>
        <div class="list__field col-4 col-md-1 text-right">$30.00</div>
        <div class="list__field d-none d-md-block col-2 text-right">07/03/20 04:28 PM</div>
      </div>
    </li>
    <li class="list__item">
      <div class="row">
        <div class="list__field col-2 col-md-1"><strong>0</strong></div>
        <div class="list__field col-3 col-md-2 text-center"><span class="list__field status status--cooking">Cooking</span></div>
        <div class="list__field d-none d-md-block col-3">Example 2</div>
        <div class="list__field d-none d-md-block col-2">Sydney, NSW</div>
        <div class="list__field col-3 col-md-1 text-center">10:00 PM</div>
        <div class="list__field col-4 col-md-1 text-right">$30.00</div>
        <div class="list__field d-none d-md-block col-2 text-right">07/03/20 04:28 PM</div>
      </div>
    </li>
    <li class="list__item">
      <div class="row">
        <div class="list__field col-2 col-md-1"><strong>0</strong></div>
        <div class="list__field col-3 col-md-2 text-center"><span class="list__field status status--done">Done</span></div>
        <div class="list__field d-none d-md-block col-3">Example 3</div>
        <div class="list__field d-none d-md-block col-2">Sydney, NSW</div>
        <div class="list__field col-3 col-md-1 text-center">07:30 PM</div>
        <div class="list__field col-4 col-md-1 text-right">$30.00</div>
        <div class="list__field d-none d-md-block col-2 text-right">07/03/20 04:28 PM</div>
      </div>
    </li>
  </ul>
</div>

@endsection