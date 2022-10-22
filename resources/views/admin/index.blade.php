@include('admin.layout.header');
<div class="wrapper">
@include('admin.layout.navbar');
@include('admin.layout.aside');
@yield('content')
@include('admin.layout.footer')