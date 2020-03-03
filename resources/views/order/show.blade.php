@extends('layouts.app')
@section('content')

<div class="container">
	<h1 class="pt-5">Admin: Orders {{ $order->id }} | {{ $order->status }}</h1>
	<div class="row">
		<div class="card col-12">
			<div class="card-body">
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
								<td class="text-right">{{ number_format($item->quantity * $item->item->price, 2) }}</td>
							</tr>
						@endforeach
						<tr class="table-info">
							<td><strong>TOTAL</strong></td>
							<td></td>
							<td></td>
							<td class="text-right"><strong> {{ number_format($totalPrice, 2) }}</strong></td>
						</tr>
					</tbody>
				</table>
				<h3>Note</h3>
				<textarea name="" id="" cols="30" rows="5" class="w-100" disabled="">{{ $order->note }}</textarea>
			</div>
		</div>
	</div>

</div>


@endsection
