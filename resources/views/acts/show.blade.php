@extends('layouts.app')

@section('content')
<div class="container">

<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
    <h1>Act
        @can('cud', $act)
        <a href="{{ url('acts/' . $act->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Act"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['acts', $act->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Act',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $act->id }}</td>
                </tr>
                <tr><th> {{ trans('acts.status') }} </th><td> {{ $act->status }} </td></tr>
                <tr>
                    <th> {{ trans('acts.file') }} </th>
                    <td> <a href="/acts/download/{{ $act->file }}" class="btn btn-primary">{{ $act->file }}</a></td>
                </tr>
                <tr>
                <th> {{ trans('acts.owner_id') }} </th><td> {{ $act->owner_id }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
