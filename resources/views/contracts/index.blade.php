@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Contracts @can('cud', $contracts[0])
    <a href="{{ url('/contracts/create') }}" class="btn btn-primary btn-xs" title="Add New Contract"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Contract Number </th><th> Start Date </th><th> End Date </th><th>Contract file</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($contracts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->contract_number }}</td><td>{{ $item->start_date }}</td><td>{{ $item->end_date }}</td>
                    <td>{{ $item->file}}</td>
                    <td>
                        <a href="{{ url('/contracts/' . $item->id) }}" class="btn btn-success btn-xs" title="View Contract"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        @can('cud', $item)
                        <a href="{{ url('/contracts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Contract"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/contracts', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Contract" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Contract',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $contracts->render() !!} </div>
    </div>

</div>
@endsection
