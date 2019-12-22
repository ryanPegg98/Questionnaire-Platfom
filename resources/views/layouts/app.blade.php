@extends('layouts.master')

@section('body')

    @include('includes.appnav')

    @yield('content')

    @include('includes.adminfoot')
@endsection