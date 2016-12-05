@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Edit Technical Inspection {{ $technicalinspection->id }}</h1>

    {!! Form::model($technicalinspection, [
        'method' => 'PATCH',
        'url' => ['/technical-inspections', $technicalinspection->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('recent_check') ? 'has-error' : ''}}">
                {!! Form::label('recent_check', 'Recent Check', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('recent_check', 'recent_check', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('recent_check', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
             <div class="form-group {{ $errors->has('owner_id') ? 'has-error' : ''}}">
            {!! Form::label('owner_id', trans('acts.owner_id'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
            {!! Form::select('owner_id', $owners, null, ['class' => 'form-control']) !!}
                {!! $errors->first('owner_id', '<p class="help-block">:message</p>') !!}
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