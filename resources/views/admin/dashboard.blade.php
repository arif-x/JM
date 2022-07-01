@extends('layouts.admin')

@section('content')

<div class="container">
    Welcome, {{ auth()->guard('admin')->user()->nama_lengkap }} <br>
    In the Admin Dashboard.....
</div>

@endsection