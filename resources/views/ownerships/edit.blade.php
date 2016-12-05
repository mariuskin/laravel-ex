@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Edit Ownership</h1>

    {!! Form::model($ownership, [
        'method' => 'PATCH',
        'url' => ['/ownerships', $ownership->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('type_of_ownership') ? 'has-error' : ''}}">
                {!! Form::label('type_of_ownership', 'Type Of Ownership', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('type_of_ownership', get_enum_values('Ownership', 'type_of_ownership'), null, ['class' => 'form-control']) !!}
                    {!! $errors->first('type_of_ownership', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('car') ? 'has-error' : ''}}">
            {!! Form::label('car_id', 'Car', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
            {!! Form::select('car_id', $cars, null, ['class' => 'form-control']) !!}
                {!! $errors->first('car_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>



    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection