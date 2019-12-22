@extends('layouts.master')

@section('body')
    @include('includes.adminnav')
    <div class="row">
        @yield('content')
    </div>
    @include('includes.adminfoot')
@endsection