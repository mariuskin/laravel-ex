@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Cars 
    @can('cud', $cars[0])
        <a href="{{ url('/cars/create') }}" class="btn btn-primary btn-xs" title="Add New Car"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Brand Model </th><th> State Number </th><th> Fabrication Year </th><th>{{trans('cars.Actions')}}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cars as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->brand_model }}</td><td>{{ $item->state_number }}</td><td>{{ $item->fabrication_year }}</td>
                    <td>
                        <a href="{{ url('/cars/' . $item->id) }}" class="btn btn-success btn-xs" title="View Car"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                    @can('cud', $item)
                        <a href="{{ url('/cars/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Car"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cars', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Car" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Car',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $cars->render() !!} </div>
    </div>

</div>
@endsection
