@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Contract
        @can('cud', $contract)
        <a href="{{ url('contracts/' . $contract->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Contract"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['contracts', $contract->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Contract',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $contract->id }}</td>
                </tr>
                <tr><th> Contract Number </th><td> {{ $contract->contract_number }} </td></tr><tr><th> Start Date </th><td> {{ $contract->start_date }} </td></tr><tr><th> End Date </th><td> {{ $contract->end_date }} </td></tr>
                <tr><th>Contract file</th><td><a href="/contracts/download/{{ $contract->file }}" class="btn btn-primary">{{ $contract->file }}</a></td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
