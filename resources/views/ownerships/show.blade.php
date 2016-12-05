@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Ownership 
        @can('cud', $ownership)
        <a href="{{ url('ownerships/' . $ownership->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Ownership"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['ownerships', $ownership->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Ownership',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $ownership->id }}</td>
                </tr>
                <tr><th> Type Of Ownership </th><td> {{ $ownership->type_of_ownership }} </td></tr>
                <tr>
                    <th> Car's Owner</th><td><a href="{{ url('/owners/' . $ownership->car->owner->id) }}" class="" title="View Owner">{{ $ownership->car->owner->first_name}} {{ $ownership->car->owner->last_name}}</a></td>
                </tr>
                <tr>
                    <th> Car's State Number</th><td><a href="{{ url('/cars/' . $ownership->car->id) }}" class="" title="View Car">{{ $ownership->car->state_number }}</a></td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
@endsection
