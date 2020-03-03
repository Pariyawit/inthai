@extends('layouts.app')
@section('content')

<div class="container">
	<h1 class="pt-5">Admin: Orders</h1>
	<div class="row">
		<div class="card col-12">
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Items Quantity</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orders as $order)
							<tr>
								<th>{{ $order->id }}</th>
								<td>{{ $order->status }}</td>
								<td>{{ $order->created_at }}</td>
								<td>{{ $order->orderItems()->count() }}</td>
								<td><a href="/orders/{{ $order->id }}" target="_blank"><button class="btn btn-primary">View</button></a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection
