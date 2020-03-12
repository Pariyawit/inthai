
@extends('layouts.app')
<div class="admin-body">
@section('content')
  <div class="container mt-3 admin-panel mb-4">
    <h1><strong>Admin Panel</strong></h1>
    <ul class="adminmenu">
      <li class="adminmenu__item adminmenu__item--active"><a href="">Main</a></li>
      <li class="adminmenu__item"><a href="">Order</a></li>
      <li class="adminmenu__item"><a href="">Category</a></li>
      <li class="adminmenu__item"><a href="">Item</a></li>
    </ul>
  </div>
@yield('admin-content')
</div>

@endsection