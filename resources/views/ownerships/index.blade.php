@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Ownerships 
    @can('cud', $ownerships[0])
    <a href="{{ url('/ownerships/create') }}" class="btn btn-primary btn-xs" title="Add New Ownership"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Type Of Ownership </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($ownerships as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->type_of_ownership }}</td>
                    <td>
                        <a href="{{ url('/ownerships/' . $item->id) }}" class="btn btn-success btn-xs" title="View Ownership"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                    @can('cud', $item)
                        <a href="{{ url('/ownerships/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Ownership"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/ownerships', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Ownership" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Ownership',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $ownerships->render() !!} </div>
    </div>

</div>
@endsection
