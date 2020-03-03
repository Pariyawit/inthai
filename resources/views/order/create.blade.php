@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row pt-5 justify-content-center m-0">
		<div class="card col-12 col-sm-10 col-md-6">
			<div class="card-body">
				<h3 class="pb-3">Delivery Details</h3>
				<form action="/customer" class="create-order-form" method="post">
					@csrf
					<input type="text" value='{{ $order->id }}' name="order_id" class="d-none">
					<div class="form-group row">
                        <label for="name" class="col-md-12 col-form-label">Full Name</label>
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-md-12 col-form-label">Mobile phone</label>
                        <div class="col-md-12">
                            <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">
                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr class="py-1">
                    <div class="form-group row">
                        <label for="address" class="col-md-12 col-form-label">Street address</label>
                        <div class="col-md-12">
                            <input id="address" type="text" class="form-control @error('address2') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                            @error('address2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address2" class="col-md-12 col-form-label">Level or unit number (Optional)</label>
                        <div class="col-md-12">
                            <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" autocomplete="address2">
                            @error('address2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="suburb" class="col-md-12 col-form-label">Town/Suburb</label>
                        <div class="col-md-12">
                            <input id="suburb" type="text" class="form-control @error('suburb') is-invalid @enderror" name="suburb" value="{{ old('suburb') }}" required autocomplete="suburb">
                            @error('suburb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="state" class="col-md-12 col-form-label">State</label>
                        <div class="col-md-12">
                            <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state">
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="postcode" class="col-md-12 col-form-label">Postcode</label>
                        <div class="col-md-12">
                            <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="" required autocomplete="postcode">
                            @error('postcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success w-100">
                                Continue
                            </button>
                        </div>
                    </div>

				</form>
			</div>
		</div>
	</div>
</div>


@endsection
