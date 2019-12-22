@extends('layouts.admin')

@section('title', 'Create Question')

@section('content')
    <h1>Create Question</h1>

    @include('errors.errorlist')

    {!! Form::open(array('action' => 'QuestionsController@store', 'id' => 'createquestion')) !!}
        {!! csrf_field() !!}

        {!! Form::hidden('questionnaire', $questionnaire) !!}

        <div class="row">
            <div class="small-12 large-2 columns">
                {!! Form::label('question', 'Question:', ['class' => 'inline']) !!}
            </div>
            <div class="small-12 large-10 columns">
                {!! Form::text('question') !!}
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-2 columns">
                {!! Form::label('type', 'Type:', ['class' => 'inline']) !!}
            </div>
            <div class="small-12 large-10 columns">
                {!! Form::select('type', array('1' => 'Text', '2' => 'Paragraph', '3' => 'Options', '4' => 'Scale'), null) !!}
            </div>
        </div>
        {!! Form::submit('Create Question', ['class' => 'button small']) !!}
    {!! Form::close() !!}

@endsection