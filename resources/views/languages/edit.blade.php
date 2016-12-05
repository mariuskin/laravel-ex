@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Edit user's language</h1>

    {!! Form::model($user, [
        'method' => 'PUT',
        'url' => ['/admin/users/language', $user->id],
        'class' => 'form-horizontal'
    ]) !!}

                
            <div class="form-group {{ $errors->has('lang') ? 'has-error' : ''}}">
                {!! Form::label('lang', 'Language', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                   
                    {!! Form::select('lang', get_enum_values('user', 'lang')  , null, ['class' => 'form-control']) !!}
                    {!! $errors->first('lang', '<p class="help-block">:message</p>') !!}
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