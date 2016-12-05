@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }

?>
<div class="container">

    <h1>Owners 
    @can('cud', $owners[0])
    <a href="{{ url('/owners/create') }}" class="btn btn-primary btn-xs" title="Add New Owner"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> First Name </th><th> Last Name </th><th>Contact Information</th><th> Email </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($owners as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{$item->contact_link}}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('/owners/' . $item->id) }}" class="btn btn-success btn-xs" title="View Owner"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        @can('cud', $item)
                        <a href="{{ url('/owners/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Owner"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/owners', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Owner" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Owner',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $owners->render() !!} </div>
    </div>

</div>
@endsection
