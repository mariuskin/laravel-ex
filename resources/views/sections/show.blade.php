@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Section 
        @can('cud', $section)
        <a href="{{ url('sections/' . $section->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Section"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['sections', $section->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Section',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $section->id }}</td>
                </tr>
                <tr><th> {{ trans('sections.name') }} </th><td> {{ $section->name }} </td></tr><tr><th> {{ trans('sections.description') }} </th><td> {{ $section->description }} </td></tr>
                    <th>{{ trans('sections.department') }}</th><td>{{ $section->department->name }}</td>
                </tr>
                
            </tbody>
        </table>
    </div>

</div>
@endsection
