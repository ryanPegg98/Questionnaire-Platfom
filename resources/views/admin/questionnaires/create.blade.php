@extends('layouts.admin')

@section('title', 'Create Questionnaire')

@section('content')
    <h1>Create Questionnaire</h1>

    <!-- Display the form to create a new questionnaire -->
    {!! Form::open(array('action' => 'QuestionnairesController@store', 'id' => 'createquestionnaire')) !!}
        {!! csrf_field() !!}

        @include('partials.forms.questionnaires')

        {!! Form::submit('Create Questionnaire', ['class' => 'button small right']) !!}
    {!! Form::close() !!}
@endsection