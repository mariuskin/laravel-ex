@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>

<div class="container">

    <div class="panel panel-default" style="padding: 1em">

        <table id="example" cellspacing="0" width="100%" class="table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>Owner</th>
                    <th>Car</th>
                    <th>Ownership</th>
                    <th>Technical Inspection</th>
                    <th>Contracts</th>
                    <th>Acts</th>
                </tr>
            </thead>

            <tbody>

                @foreach($owners as $item)   
                <?php

                $item2 = $item;

                
                ?>
                <tr>
                    <td><a href="{{ url('/owners/' . $item->id) }}" class="list-group-item" title="View Owner">{{ $item->first_name }} {{$item->last_name}}</a>
                    </td>
                    <td>
                        @foreach ($item2->cars as $item)
                        <a href="{{ url('/cars/' . $item->id) }}" class="list-group-item" title="View Car">{{$item->state_number}}</a>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($item2->cars as $item)
                        <?php
                            $car_id = $item->id;
                            $item = $item->ownership;
                        ?>
                        @if($item['id']!= '')
                        <a href="{{ url('/ownerships/' . $item['id']) }}" class="list-group-item  
                        @if($item->type_of_ownership === 'OWN')
                            {{'list-group-item-warning'}}
                        @elseif($item->type_of_ownership === 'RENT')
                            {{'list-group-item-info'}}
                        @endif" title="View Ownership">
                        
                         @if($item->type_of_ownership === 'OWN')
                            {{'Own'}}
                        @elseif($item->type_of_ownership === 'RENT')
                            {{'Rent'}}
                        @endif
                        

                        </a>
                        @endif
                        @endforeach
                    </td>
                    <td>


                        @foreach($item2->cars as $item)
                        @foreach ($item->technical_inspections as $item)
                        <a href="{{ url('/technical-inspections/' . $item->id) }}" class="list-group-item" title="View TechnicalInspection">
                            {{$item->recent_check}}
                        </a>
                        @endforeach
                        @endforeach
                    </td>
                    <td>
                        @foreach ($item2->contracts as $item)
                        <a href="{{ url('/contracts/' . $item->id) }}" class="list-group-item" title="View Contract">{{ $item->contract_number }}</a>
                        @endforeach   


                    </td>
                    
                    <td>
                        @foreach ($item2->acts as $item)
                        
                        

                        <a href="{{ url('/acts/' . $item->id) }}" class="list-group-item 
                        @if($item->status === 'AVAILABLE')
                            {{'list-group-item-success'}}
                        @else($item->status === 'UNAVAILABLE')
                            {{'list-group-item-danger'}}
                        @endif" title="View Act">
                            
                            @if($item->status === 'AVAILABLE')
                            {{'Availabe'}}
                            @else($item->status === 'UNAVAILABLE')
                            {{'Unavailable'}}
                            @endif
                        
                        </a>

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


