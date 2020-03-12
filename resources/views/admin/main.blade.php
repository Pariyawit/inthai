@extends('layouts.admin')

@section('admin-content')

<div class="container">
  <h3 class="mt-3">New</h3>
  <ul class="order">
    <li class="order__item order__item--head">
      <div class="row">
        <div class="order__field col-2 col-md-1"><strong>#</strong></div>
        <div class="order__field col-3 col-md-2 text-center">Status</div>
        <div class="order__field d-none d-md-block col-3">Name</div>
        <div class="order__field d-none d-md-block col-2">Location</div>
        <div class="order__field col-3 col-md-1 text-center">Delivery</div>
        <div class="order__field col-4 col-md-1 text-right">Total</div>
        <div class="order__field d-none d-md-block col-2 text-right">Ordered Time</div>
      </div>
    </li>
    <li class="order__item">
      <div class="row">
        <div class="order__field col-2 col-md-1"><strong>1</strong></div>
        <div class="order__field col-3 col-md-2 text-center"><span class="order__field status status--new">New</span></div>
        <div class="order__field d-none d-md-block col-3">Tim Jatukannyaprateep</div>
        <div class="order__field d-none d-md-block col-2">Sydney, NSW</div>
        <div class="order__field col-3 col-md-1 text-center">ASAP</div>
        <div class="order__field col-4 col-md-1 text-right">$30.00</div>
        <div class="order__field d-none d-md-block col-2 text-right">07/03/20 16:28</div>
      </div>
    </li>
    <li class="order__item">
      <div class="row">
        <div class="order__field col-2 col-md-1"><strong>13</strong></div>
        <div class="order__field col-3 col-md-2 text-center"><span class="order__field status status--cooking">Cooking</span></div>
        <div class="order__field d-none d-md-block col-3">Tim Jatukannyaprateep</div>
        <div class="order__field d-none d-md-block col-2">Sydney, NSW</div>
        <div class="order__field col-3 col-md-1 text-center">10:00 PM</div>
        <div class="order__field col-4 col-md-1 text-right">$30.00</div>
        <div class="order__field d-none d-md-block col-2 text-right">07/03/20 16:28</div>
      </div>
    </li>
    <li class="order__item">
      <div class="row">
        <div class="order__field col-2 col-md-1"><strong>123</strong></div>
        <div class="order__field col-3 col-md-2 text-center"><span class="order__field status status--done">Done</span></div>
        <div class="order__field d-none d-md-block col-3">Tim Jatukannyaprateep</div>
        <div class="order__field d-none d-md-block col-2">Sydney, NSW</div>
        <div class="order__field col-3 col-md-1 text-center">7:30 PM</div>
        <div class="order__field col-4 col-md-1 text-right">$30.00</div>
        <div class="order__field d-none d-md-block col-2 text-right">07/03/20 16:28</div>
      </div>
    </li>
  </ul>
</div>

@endsection
