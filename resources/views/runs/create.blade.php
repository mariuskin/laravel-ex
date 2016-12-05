@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Run</h1>
    <hr/>

    {!! Form::open(['url' => '/runs', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
                {!! Form::label('year', 'Year', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('year', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('first_quarter') ? 'has-error' : ''}}">
                {!! Form::label('first_quarter', 'First Quarter', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('first_quarter', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('first_quarter', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('second_quarter') ? 'has-error' : ''}}">
                {!! Form::label('second_quarter', 'Second Quarter', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('second_quarter', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('second_quarter', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('third_quarter') ? 'has-error' : ''}}">
                {!! Form::label('third_quarter', 'Third Quarter', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('third_quarter', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('third_quarter', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fourth_quarter') ? 'has-error' : ''}}">
                {!! Form::label('fourth_quarter', 'Fourth Quarter', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('fourth_quarter', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fourth_quarter', '<p class="help-block">:message</p>') !!}
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