@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Acts @can('cud', $acts[0])
    <a href="{{ url('/acts/create') }}" class="btn btn-primary btn-xs" title="Add New Act"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
    @endcan
    </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('acts.status') }} </th><th> {{ trans('acts.file') }} </th><th> {{ trans('acts.owner_id') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($acts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->status }}</td><td>{{ $item->file }}</td><td>{{ $item->owner_id }}</td>
                    <td>
                        <a href="{{ url('/acts/' . $item->id) }}" class="btn btn-success btn-xs" title="View Act"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        @can('cud', $item)
                        <a href="{{ url('/acts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Act"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/acts', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Act" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Act',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $acts->render() !!} </div>
    </div>

</div>
@endsection
