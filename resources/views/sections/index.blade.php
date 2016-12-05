@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

   <h1>Sections @can('cud', $sections[0])
    <a href="{{ url('/sections/create') }}" class="btn btn-primary btn-xs" title="Add New Section"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('sections.name') }} </th><th> {{ trans('sections.description') }} </th><th> {{ trans('sections.department_id') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($sections as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td><td>{{ $item->description }}</td><td>{{ $item->department_id }}</td>
                    <td>
                        <a href="{{ url('/sections/' . $item->id) }}" class="btn btn-success btn-xs" title="View Section"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        @can('cud', $item)
                        <a href="{{ url('/sections/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Section"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/sections', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Section" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Section',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $sections->render() !!} </div>
    </div>

</div>
@endsection
