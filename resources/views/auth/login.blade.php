@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="row">
        <h1>Login</h1>
        <div class="small-12 medium-6 large-4 columns">
            <!-- login form -->
            <form class="panel" method="post" action="/login">
                {{ csrf_field() }}

                {{ Form::label('email', 'Email Address:') }}
                {{ Form::text('email') }}
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
                {{ Form::checkbox('remember') }}{{ Form::label('remember', 'Remember Me', ['class' => 'inline']) }}
                <br />
                {{ Form::submit('Login', ['class' => 'button small']) }} <a href="/password/reset">Forgot Your Password?</a>
            </form>
        </div>
        <div class="small-12 medium-6 large-8 columns">
            <!-- Error messages -->
            @include('errors.errorlist')
        </div>
    </div>
@endsection
