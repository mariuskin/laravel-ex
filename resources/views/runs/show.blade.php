@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Run
        @can('cud', $run)
        <a href="{{ url('runs/' . $run->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Run"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['runs', $run->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Run',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $run->id }}</td>
                </tr>
                <tr><th> Car's state number </th><td> <a href="{{ url('/cars/' . $run->car->id) }}"  title="View Car">{{ $run->car->state_number }} </a></td></tr>
                <tr><th> Year </th><td> {{ $run->year }} </td></tr>
                <tr><th> First Quarter </th><td> {{ $run->first_quarter }} </td></tr>
                <tr><th> Second Quarter </th><td> {{ $run->second_quarter }} </td></tr>
                <tr><th> Third Quarter </th><td> {{ $run->third_quarter }} </td></tr>
                <tr><th> Fourth Quarter </th><td> {{ $run->fourth_quarter }} </td></tr>

            </tbody>
        </table>
    </div>

</div>
@endsection
