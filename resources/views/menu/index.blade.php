@extends('layouts.app')
@section('content')

<div class="banner text-center">
	<img src="storage/uploads/banner.jpg" alt="">
</div>

<div class="container">
	<div class="heading pt-3">
		<h1><img src="storage/uploads/inthai-logo.gif" class="rounded-circle"> In Thai Style Restaurant</h1>
	</div>
	<div class="row pt-3 no-gutters">

		<div class="col-2 pr-2 d-none d-lg-block">
			<h3>Categories</h3>
			<div class="card pt-3">
			<div class="card-body categories">
				<div class="category-item pb-3">
					<a href="#"><span class="text-dark">Entree</span></a>
				</div>
				<div class="category-item pb-3">
					<a href="#"><span class="text-dark">Entree</span></a>
				</div>
				<div class="category-item pb-3">
					<a href="#"><span class="text-dark">Entree</span></a>
				</div>
			</div>
		</div>
		</div>

		<div class="col-lg-7 col-12 pr-2">
			<h3>Menu</h3>
			<div class="card pt-3">
				<div class="card-body menu">
					<div class="category pb-5">
						<h3>Entree</h3>
						<div class="row menu-item py-3">
							<div class="col-12">
								<div class="title">Vegetable Spring Roll</div>
							</div>
							<div class="col-md-9 col-12">
								<div class="description"></div>
							</div>
							<div class="col-md-3 col-12 text-right">
								<div class="price">$11.50<button class="btn btn-add btn-success ml-1">+</button></div>
							</div>
						</div>
						<div class="row menu-item py-3">
							<div class="col-12"><div class="title">Money Bag</div></div>
							<div class="col-md-9 col-12">
								<div class="description">Chicken, crab meat, peas and coconut wrapped in pastry served with sweet chilli sauce.</div>
							</div>
							<div class="col-md-3 col-12 text-right">
								<div class="price">$11.50<button class="btn btn-add btn-success ml-1">+</button></div>
							</div>
						</div>
						<div class="row menu-item py-3">
							<div class="col-12"><div class="title">Money Bag</div></div>
							<div class="col-md-9 col-12">
								<div class="description">Chicken, crab meat, peas and coconut wrapped in pastry served with sweet chilli sauce.</div>
							</div>
							<div class="col-md-3 col-12 text-right">
								<div class="price">$11.50<button class="btn btn-add btn-success ml-1">+</button></div>
							</div>
						</div>

					</div>

					<div class="category pb-5">
						<h3>Entree</h3>
						<div class="row menu-item py-3">
							<div class="col-12">
								<div class="title">Vegetable Spring Roll</div>
							</div>
							<div class="col-md-9 col-12">
								<div class="description"></div>
							</div>
							<div class="col-md-3 col-12 text-right">
								<div class="price">$11.50<button class="btn btn-add btn-success ml-1">+</button></div>
							</div>
						</div>
						<div class="row menu-item py-3">
							<div class="col-12"><div class="title">Money Bag</div></div>
							<div class="col-md-9 col-12">
								<div class="description">Chicken, crab meat, peas and coconut wrapped in pastry served with sweet chilli sauce.</div>
							</div>
							<div class="col-md-3 col-12 text-right">
								<div class="price">$11.50<button class="btn btn-add btn-success ml-1">+</button></div>
							</div>
						</div>
						<div class="row menu-item py-3">
							<div class="col-12"><div class="title">Money Bag</div></div>
							<div class="col-md-9 col-12">
								<div class="description">Chicken, crab meat, peas and coconut wrapped in pastry served with sweet chilli sauce.</div>
							</div>
							<div class="col-md-3 col-12 text-right">
								<div class="price">$11.50<button class="btn btn-add btn-success ml-1">+</button></div>
							</div>
						</div>

					</div>

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
