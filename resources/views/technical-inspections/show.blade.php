@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Technical Inspection
        @can('cud', $technicalinspection)
        <a href="{{ url('technical-inspections/' . $technicalinspection->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit TechnicalInspection"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['technicalinspections', $technicalinspection->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete TechnicalInspection',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $technicalinspection->id }}</td>
                </tr>
                <tr><th> Recent Check </th><td> {{ $technicalinspection->recent_check }} </td></tr><tr><th> Dates </th><td> {{ $technicalinspection->dates }} </td></tr>
                <tr><th> Owner </th><td> <a href="{{ url('/owners/' . $technicalinspection->owner->id) }}" class="" title="View Owner"><strong>{{ $technicalinspection->owner->first_name }} {{ $technicalinspection->owner->last_name }}</a></strong> </td></tr>
                <tr><th> Car's state number </th><td> <a href="{{ url('/cars/' . $technicalinspection->car->id) }}" class="" title="View Car"><strong> {{ $technicalinspection->car->state_number }}</strong> </a></td></tr><tr>

            </tbody>
        </table>
    </div>

</div>
@endsection
