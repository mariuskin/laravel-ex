@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Edit Act {{ $act->id }}</h1>

    {!! Form::model($act, [
        'method' => 'PATCH',
        'url' => ['/acts', $act->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', trans('acts.status'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('status', get_enum_values('Act', 'status'), null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
                {!! Form::label('file', trans('acts.file'), ['class' => 'col-sm-3 control-label']) !!}
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


            {{-- <div class="form-group {{ $errors->has('owner_id') ? 'has-error' : ''}}">
                {!! Form::label('owner_id', trans('acts.owner_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('owner_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('owner_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
 --}}

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