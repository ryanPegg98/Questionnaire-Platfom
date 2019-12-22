@extends('layouts.admin')

@section('title', 'Questionnaires')

@section('content')
    <h1>Questionnaires</h1>
    <!-- Check for any messages -->
    @include('errors.flash')
    <!-- Display all of the questionnaires -->
    @if( isset($questionnaires))
        @if(count($questionnaires) > 0)
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>Questionnaire</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questionnaires as $questionnaire)
                        <tr>
                            <td><p>{{ $questionnaire->title }}</p></td>
                            <td>
                                @if($questionnaire->status == 0)
                                    <p class="label radius alert">Closed</p>
                                @else
                                    <p class="label radius success">Open</p>
                                @endif
                            </td>
                            <td>
                                <a href="/admin/questionnaires/{{ $questionnaire->id }}/edit" class="button success small" name="edit{{ $questionnaire->id }}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.questionnaires.destroy', $questionnaire->id], 'id' => 'del' . $questionnaire->id]) !!}
                                    {!! Form::submit('Delete', ['class' => 'button alert small']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert-box">
                <p>You have not created any questionnaires.</p>
            </div>
        @endif
    @else
        <div class="alert-box">
            <p>No questionnaires have been found.</p>
        </div>
    @endif

    <a href="/admin/questionnaires/create" class="button"><i class="fas fa-plus"></i> Create Questionnaire</a>
@endsection