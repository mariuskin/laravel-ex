@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Create New Contract</h1>
    <hr/>

    {!! Form::open(['url' => '/contracts', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group {{ $errors->has('contract_number') ? 'has-error' : ''}}">
                {!! Form::label('contract_number', 'Contract Number', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('contract_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('contract_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
                {!! Form::label('start_date', 'Start Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
                {!! Form::label('end_date', 'End Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
                {!! Form::label('file', 'File', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('file', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('owner_id') ? 'has-error' : ''}}">
            {!! Form::label('owner_id', trans('acts.owner_id'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
            {!! Form::select('owner_id', $owners, null, ['class' => 'form-control']) !!}
                {!! $errors->first('owner_id', '<p class="help-block">:message</p>') !!}
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