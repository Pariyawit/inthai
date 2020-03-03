@extends('layouts.app')
@section('content')

<div class="container">
	<h1 class="pt-5">Admin: Orders {{ $order->id }} | {{ $order->status }}</h1>
	<div class="row">
		<div class="card col-12 col-md-8">
			<div class="card-body order-show  justify-content-between flex-column">
				<div>
					<h3>Order Detail #{{ $order->id }}</h3>
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
								<td class="text-right"><strong> ${{ number_format($totalPrice, 2) }}</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div>
					<h5>Note</h5>
					<textarea name="" id="" cols="30" rows="5" class="w-100" disabled="">{{ $order->note }}</textarea>
				</div>
			</div>
		</div>

		<div class="card col-12 col-md-4">
			<div class="card-body">
				<h3>Delivery Detail</h3>
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
			</div>
		</div>
	</div>

</div>


@endsection
