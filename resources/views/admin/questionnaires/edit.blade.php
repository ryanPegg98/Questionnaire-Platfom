@extends('layouts.admin')

@section('title', 'Edit ' . $questionnaire->title)

@section('content')
    <h1>Edit - {{ $questionnaire->title }}</h1>

    <!-- Check for any messages -->
    @include('errors.flash')

    <div class="panel">
        <ul class="tabs" data-tab>
            <li class="tab-title active"><a href="#details">Details</a></li>
            <li class="tab-title"><a href="#questions">Questions</a></li>
        </ul>
        <div class="tabs-content">
            <div class="content active" id="details">
                {!! Form::model($questionnaire, ['method' => 'PATCH', 'url' => '/admin/questionnaires/' . $questionnaire->id]) !!}
                    @include('partials.forms.questionnaires')
                    {!! Form::submit('Update Questionnaire', ['class' => 'button small right']) !!}
                {!! Form::close() !!}
            </div>
            <div class="content" id="questions">
                <h2>Questions</h2>
                @if(isset($questions))
                    @if(count($questions) > 0)
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Question:</th>
                                    <th>Edit:</th>
                                    <th>Delete:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td>{{ $question->question }}</td>
                                        <td><a href="/admin/questions/{{ $question->id }}/edit" class="button small" name="qedit{{ $question->id }}">Edit</a></td>
                                        <td><a href="#" class="button alert small">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert-box alert">You haven't created any questions yet!</p>
                    @endif
                @else
                    <p class="alert-box alert">You haven't created any questions yet!</p>
                @endif
                <a href="/admin/questions/create/{{ $questionnaire->id }}" class="button small"><i class="fas fa-plus"></i> Create Question</a>
            </div>
        </div>
    </div>



@endsection