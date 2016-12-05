@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Runs 
    @can('cud', $runs[0])
    <a href="{{ url('/runs/create') }}" class="btn btn-primary btn-xs" title="Add New Run"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Year </th><th> First Quarter </th><th> Second Quarter </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($runs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->year }}</td><td>{{ $item->first_quarter }}</td><td>{{ $item->second_quarter }}</td>
                    <td>
                        <a href="{{ url('/runs/' . $item->id) }}" class="btn btn-success btn-xs" title="View Run"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                    @can('cud', $item)
                        <a href="{{ url('/runs/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Run"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/runs', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Run" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Run',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $runs->render() !!} </div>
    </div>

</div>
@endsection
