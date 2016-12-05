@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Technical inspections 
    @can('cud', $technicalinspections[0])
        <a href="{{ url('/technical-inspections/create') }}" class="btn btn-primary btn-xs" title="Add New TechnicalInspection"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Recent Check </th><th> Dates </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($technicalinspections as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->recent_check }}</td><td>{{ $item->dates }}</td>
                    <td>
                        <a href="{{ url('/technical-inspections/' . $item->id) }}" class="btn btn-success btn-xs" title="View TechnicalInspection"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                    @can('cud', $item)
                        <a href="{{ url('/technical-inspections/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit TechnicalInspection"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/technical-inspections', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete TechnicalInspection" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete TechnicalInspection',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $technicalinspections->render() !!} </div>
    </div>

</div>
@endsection
