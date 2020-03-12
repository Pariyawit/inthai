@extends('layouts.app')
<div class="admin-body">
  @section('content')
  <div class="container mt-3 admin-panel mb-4">
    <h1><strong>Admin Panel</strong></h1>
    <ul class="adminmenu">
      <li class="adminmenu__item {{ $page == 'main' ? 'adminmenu__item--active' : ''}}"><a href="">Main</a></li>
      <li class="adminmenu__item {{ $page == 'order' ? 'adminmenu__item--active' : ''}}"><a href="">Order</a></li>
      <li class="adminmenu__item {{ $page == 'category' ? 'adminmenu__item--active' : ''}}"><a href="">Category</a></li>
      <li class="adminmenu__item {{ $page == 'item' ? 'adminmenu__item--active' : ''}}"><a href="">Item</a></li>
    </ul>
  </div>
  @yield('admin-content')
</div>

@endsection