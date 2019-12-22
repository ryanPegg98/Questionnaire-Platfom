<div class="row">
    <div class="small-12 large-2 columns">
        {!! Form::label('title', 'Title:', ['class' => 'inline']) !!}
    </div>
    <div class="small-12 large-10 columns">
        {!! Form::text('title') !!}
    </div>
</div>
<div class="row">
    <div class="small-12 large-2 columns">
        {!! Form::label('description', 'Description:', ['class' => 'inline']) !!}
    </div>
    <div class="small-12 large-10 columns">
        {!! Form::textarea('description') !!}
    </div>
</div>
<div class="row">
    <div class="small-12 large-2 columns">
        {!! Form::label('agreement', 'Ethics Agreement:', ['class' => 'inline']) !!}
    </div>
    <div class="small-12 large-10 columns">
        {!! Form::textarea('agreement') !!}
    </div>
</div>
<div class="row">
    <div class="small-12 large-2 columns">
        {!! Form::label('layout', 'Layout:', ['class' => 'inline']) !!}
    </div>
    <div class="small-12 large-10 columns">
        {!! Form::select('layout', array('1' => 'One by One', '2' => 'Listed'), null) !!}
    </div>
</div>