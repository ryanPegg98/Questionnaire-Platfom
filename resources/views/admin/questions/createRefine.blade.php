@extends('layouts.admin')

@section('title', 'Create Question')

@section('content')
    <h1>Create Question</h1>

    {!! Form::open(array('action' => 'QuestionsController@store', 'id' => 'createquestion')) !!}

        {!! csrf_field() !!}

        {!! Form::hidden('questionnaire', $data['questionnaire']) !!}

        <div class="row">
            <div class="small-12 large-2 columns">
                {!! Form::label('question', 'Question:', ['class' => 'inline']) !!}
            </div>
            <div class="small-12 large-10 columns">
                {!! Form::text('question', $data['question']) !!}
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-2 columns">
                {!! Form::label('type', 'Type:', ['class' => 'inline']) !!}
            </div>
            <div class="small-12 large-10 columns">
                {!! Form::select('type', array('1' => 'Text', '2' => 'Paragraph', '3' => 'Options', '4' => 'Scale'), $data['type']) !!}
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-2 columns">
                {!! Form::label('layout', 'Layout:') !!}
            </div>
            <div class="small-12 large-10 columns">
                {!! Form::select('layout', array('1' => 'Dropdown', '2' => 'Listed')) !!}
            </div>
        </div>

        {!! Form::submit('Create Question', ['class' => 'button small right']) !!}
    {!! Form::close() !!}

@endsection