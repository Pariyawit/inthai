@extends('layouts.app')
@section('content')

<div class="container">
	<h1>Admin: Orders {{ $order->id }} | {{ $order->status }}</h1>
	<table class="table">
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
					<td class="text-right">{{ $item->quantity * $item->item->price }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>


@endsection
