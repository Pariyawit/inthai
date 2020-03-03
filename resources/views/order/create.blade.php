@extends('layouts.app')
@section('content')

<div class="container">
	<h1 class="pt-5">Delivery Information</h1>
	<div class="row">
		<div class="card col-12">
			<div class="card-body">
				{{ $order }}
			</div>
		</div>
	</div>
</div>


@endsection
