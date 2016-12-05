@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Create New Car</h1>
    <hr/>

    {!! Form::open(['url' => '/cars', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('brand_model') ? 'has-error' : ''}}">
                {!! Form::label('brand_model', 'Brand Model', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('brand_model', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('brand_model', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('state_number') ? 'has-error' : ''}}">
                {!! Form::label('state_number', 'State Number', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('state_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('state_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fabrication_year') ? 'has-error' : ''}}">
                {!! Form::label('fabrication_year', 'Fabrication Year', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('fabrication_year', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fabrication_year', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('oil_type') ? 'has-error' : ''}}">
                {!! Form::label('oil_type', 'Oil Type', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('oil_type', get_enum_values('Car', 'oil_type'), null, ['class' => 'form-control']) !!}
                    {!! $errors->first('oil_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('gps') ? 'has-error' : ''}}">
                {!! Form::label('gps', 'Gps', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('gps', get_enum_values('Car', 'gps'), null, ['class' => 'form-control']) !!}
                    {!! $errors->first('gps', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('owner_id') ? 'has-error' : ''}}">
            {!! Form::label('owner_id', trans('cars.owner_id'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
            {!! Form::select('owner_id', $owners, null, ['class' => 'form-control']) !!}
                {!! $errors->first('owner_id', '<p class="help-block">:message</p>') !!}
            </div>
            </div>
            <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
            {!! Form::label('image', trans('cars.image'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
            </div>



    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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