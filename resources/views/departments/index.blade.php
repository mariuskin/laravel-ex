@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
    // dd(isset($departments[4]));
?>
<div class="container">

    <h1>{{ trans('departments.Departments') }} 
    @can('cud', $departments[0])
    <a href="{{ url('/departments/create') }}" class="btn btn-primary btn-xs" title="Add New Department"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('departments.name') }} </th><th> {{ trans('departments.description') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($departments as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td><td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ url('/departments/' . $item->id) }}" class="btn btn-success btn-xs" title="View Department"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        @can('cud', $item)
                        <a href="{{ url('/departments/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Department"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/departments', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Department" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Department',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $departments->render() !!} </div>
    </div>

</div>
@endsection
