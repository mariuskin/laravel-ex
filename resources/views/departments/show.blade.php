@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Department
        @can('cud', $department)
        <a href="{{ url('departments/' . $department->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Department"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['departments', $department->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Department',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $department->id }}</td>
                </tr>
                <tr><th> {{ trans('departments.name') }} </th><td> {{ $department->name }} </td></tr><tr><th> {{ trans('departments.description') }} </th><td> {{ $department->description }} </td></tr>
                <tr>
                    <th>{{trans('departments.sections')}}</th><td>
                    @foreach ($department->sections as $section)
                        <p>{{$section->name}}</p>
                    @endforeach</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
