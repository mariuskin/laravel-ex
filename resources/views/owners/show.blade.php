@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Owner
        @can('cud', $owner)
        <a href="{{ url('owners/' . $owner->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Owner"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['owners', $owner->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Owner',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $owner->id }}</td>
                </tr>
                <tr><th> {{trans('owners.First_Name')}} </th><td> {{ $owner->first_name }} </td></tr><tr><th> {{trans('owners.Last_Name')}} </th><td> {{ $owner->last_name }} </td></tr>
                <tr>
                    <th>{{trans('owners.Contact_Information')}}</th><td><a href="{{ $owner->contact_link }}">Click Here</a></td>
                </tr>
                <tr><th> {{ trans('owners.Email') }} </th><td> {{ $owner->email }} </td></tr>
                <tr><th> {{ trans('owners.section') }} </th><td>{{$owner->section->department->name}}-{{ $owner->section->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
