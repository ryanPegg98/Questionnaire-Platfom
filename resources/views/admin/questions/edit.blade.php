@extends('layouts.admin')

@section('title', 'Edit - ' . $question->question)

@section('content')
    <h1>Edit - {{ $question->question }}</h1>

    <!-- Check for any messages -->
    @include('errors.flash')

    @include('errors.errorlist')

    {!! Form::model($question, ['method' => 'PATCH', 'url' => '/admin/questions/' . $question->id, 'id' => 'editquestionnaire']) !!}
        {!! csrf_field() !!}

        {!! Form::hidden('questionnaire') !!}

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
                <input type="text" value=
                 @if($question->type == 1)
                        "Text"
                 @elseif($question->type == 2)
                        "Paragraph"
                 @elseif($question->type == 3)
                        "Options"
                 @else
                        "Scale"
                 @endif
                " readonly/>
            </div>
        </div>

        @if($question['layout'] != null)
            <div class="row">
                <div class="small-12 large-2 columns">
                    {!! Form::label('layout', 'Layout:', ['class' => 'inline']) !!}
                </div>
                <div class="small-12 large-10 columns">
                    {!! Form::select('layout', array('1' => 'Dropdown', '2' => 'Listed')) !!}
                </div>
            </div>
        @endif

        {!! Form::submit('Update Question', ['class' => 'button small right']) !!}
    {!! Form::close() !!}

    @if($question['type'] == 3)
        <h2>Options</h2>

        <!-- Form to create new options -->
        {!! Form::open(array('action' => 'OptionsController@store', 'id' => 'createoption')) !!}
            {!! Form::hidden('question', $question->id) !!}
            <div class="row panel">
                <div class="small-12 medium-6 large-10 columns">
                    {!! Form::text('option', null, ['placeholder' => 'Enter the option']) !!}
                </div>
                <div class="small-12 medium-6 large-2 columns">
                    {!! Form::submit('Create Option', ['class' => 'button small']) !!}
                </div>
            </div>
        {!! Form::close() !!}

        @if(isset($question['options']))
            @if(count($question['options']) > 0)
                <table style="width: 100%">
                    <thead>
                        <tr>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($question['options'] as $option)
                            <tr>
                                <td>{{ $option['option'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <p class="alert-box alert">You have not created any options for this question!</p>
            @endif
        @else
            <p class="alert-box alert">You have not created any options for this question!</p>
        @endif
    @elseif($question['type'] == 4)
        <h2>Scale</h2>

        <?php
            $scale = $question['scale'];
        ?>

        {!! Form::model($scale, ['method' => 'PATCH', 'url' => '/admin/scales/' . $scale->id, 'id' => 'editscale']) !!}
            {!! csrf_field() !!}

            {!! Form::label('startDetail', 'Start Detail:') !!}
            {!! Form::text('startDetail') !!}

            {!! Form::label('start', 'Start Number:') !!}
            {!! Form::number('start') !!}

            {!! Form::label('startDetail', 'Start Detail:') !!}
            {!! Form::text('endDetail') !!}

            {!! Form::label('end', 'End Number:') !!}
            {!! Form::number('end') !!}

            {!! Form::submit('Update Scale', ['class' => 'button small right']) !!}

        {!! Form::close() !!}

    @endif
@endsection