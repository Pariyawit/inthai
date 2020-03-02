@extends('layouts.app')
@section('content')

<div class="banner text-center">
	<img src="img/banner.jpg" alt="">
</div>
<restaurant-menu :categories="{{  json_encode($categories) }}" :items="{{  json_encode($items) }}"></restaurant-menu>

<div class="container">
	<div class="heading pt-3">
		<h1><img src="img/inthai-logo.gif" class="rounded-circle"> In Thai Style Restaurant</h1>
	</div>
	<div class="row pt-3 no-gutters">

		<div class="col-2 pr-2 d-none d-lg-block">
			<h3>Categories</h3>
			<div class="card pt-3">
				<div class="card-body categories">
					@foreach ($categories as $category)
						@if ($category->items->count() > 0)
							<div class="category-item pb-3">
								<a href="#"><span class="text-dark">{{ $category->title }}</span></a>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-lg-7 col-12 pr-2">
			<h3>Menu</h3>
			<div class="card pt-3">
				<div class="card-body menu">
					@foreach ($categories as $category)
						@if ($category->items->count() > 0)

						@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-12">
			<div class="pt-3 pt-lg-0">
				<h3>Basket total
					<span class="float-right">$21.80</span>
				</h3>
			</div>
			<div class="card basket-total">
				<div class="card-body">
					<div class="text-center">
						<button class="btn btn-success w-100">Order Now</button>
					</div>
					<hr>
					<div class="order-item-list">
						<div class="order-item py-1">
							<div class="d-flex">
								<div>
									<button class="btn btn-outline-success">-</button>
								</div>
								<div class="mr-1">10 x</div>
								<div class="mr-1 flex-shrink-1"><em>Vegetable Spring Roll</em></div>
								<div class="ml-auto">$21.80</div>
							</div>
						</div>
						<div class="order-item py-1">
							<div class="d-flex">
								<div>
									<button class="btn btn-outline-success">-</button>
								</div>
								<div class="mr-1">2 x</div>
								<div class="mr-1"><em>Money Bag</em></div>
								<div class="ml-auto">$21.80</div>
							</div>
						</div>
						<div class="order-item py-1">
							<div class="d-flex">
								<div>
									<button class="btn btn-outline-success">-</button>
								</div>
								<div class="mr-1">10 x</div>
								<div class="mr-1"><em>Roll</em></div>
								<div class="ml-auto">$21.80</div>
							</div>
						</div>

					</div>
					<hr>
					<div class="calculation">
						<div>
							Subtotal <span class="float-right">$21.80</span>
						</div>
						<div>
							Discount applied <span class="float-right">$21.80</span>
						</div>
						<div>
							Delivery fee <span class="float-right">$21.80</span>
						</div>
						<div>
							<strong>Total <span class="float-right">$21.80</span></strong>
						</div>
					</div>
					<hr>
					<div class="note">
						<p>
						<strong>Leave a note</strong> for the restaurant with anything they need to know. Do not include details about any allergies.
						</p>

						<textarea type="textarea" rows="5" class="w-100" placeholder="e.g. the doorbell doesn't work">

						</textarea>

					</div>

				</div>
			</div>
		</div>
	</div>

</div>
@endsection
