@extends('layouts.app')
@section('content')

<div class="banner text-center">
	<img src="img/banner.jpg" alt="">
</div>
<restaurant-menu :categories="{{  json_encode($categories) }}" :items="{{  json_encode($items) }}"></restaurant-menu>

@endsection
