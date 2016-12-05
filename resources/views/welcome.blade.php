@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('app.wellcome') }}

</div>

                <div class="panel-body">
                    This is LGParking app.
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
