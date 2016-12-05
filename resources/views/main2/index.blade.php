@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <div class="panel panel-default" style="padding: 1em">

        <table id="example2" cellspacing="0" width="100%" class="table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Owner</th>
                    <th>Ownership</th>
                    <th>Technical Inspection</th>
                </tr>
            </thead>

            <tbody>

                @foreach($cars as $item)   
                <?php

                $item2 = $item;

                
                ?>
                <tr>
                    <td><a href="{{ url('/cars/' . $item->id) }}" class="list-group-item" title="View Owner"><strong>{{ $item->state_number }}</strong></a>
                    </td>

                    <td>
                        <a href="{{ url('/owners/' . $item->owner->id) }}" class="list-group-item" title="View Car"> {{$item->owner->first_name }} {{ $item->owner->last_name }}</a>
                        
                    </td>
                    <td>
                        <a href="{{ url('/ownerships/' . $item->ownership->id) }}" class="list-group-item" title="View Car"> {{$item->ownership->type_of_ownership }}</a>
                    </td>
                    <td>
                    @foreach ($item2->owner->technical_inspections as $item)
                     

                        <a href="{{ url('/technical-inspections/' . $item->id) }}" class="list-group-item" title="View Car"> {{ $item->recent_check}}</a>
                    @endforeach
                     
                    </td>
                    
                </tr>


                {{-- End nesting --}}
                @endforeach

            </tbody>
        </table>
    </div>

</div>
    
@stop


