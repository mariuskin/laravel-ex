@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Create New Owner</h1>
    <hr/>

    {!! Form::open(['url' => '/owners', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('contact_link') ? 'has-error' : ''}}">
                {!! Form::label('contact_link', 'Contact Link', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('contact_link', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('contact_link', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sections') ? 'has-error' : ''}}">
                {!! Form::label('sections', trans('sections.sections'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('sections',$sections , null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sections', '<p class="help-block">:message</p>') !!}
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