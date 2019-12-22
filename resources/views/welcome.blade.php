@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    <div class="row">
        <h1>Welcome @if(Auth::user()) {{ Auth::user()->name }} @endif</h1>
        <div class="panel">
            <p>You will need to login to be able to access your questionnaires.</p>
        </div>
    </div>

@endsection
