@extends('layouts.app')

@section('content')
<?php
if (!Auth::guest()) {
        App::setLocale(Auth::user()->lang);
    }
?>
<div class="container">

    <h1>Car
        @can('cud', $car)
        <a href="{{ url('cars/' . $car->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Car"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['cars', $car->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Car',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
        @endcan
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $car->id }}</td>
                </tr>
                <tr><th> Brand Model </th><td> {{ $car->brand_model }} </td></tr>
                <tr><th> State Number </th><td> {{ $car->state_number }} </td></tr>
                <tr><th> Fabrication Year </th><td> {{ $car->fabrication_year }} </td></tr>
                <tr><th>Ownership Type</th><td>
                <strong>
                @if ($car->ownership)

                    @if ($car->ownership->type_of_ownership === 'OWN')
                    {{ "Owned" }}
                    @elseif($car->ownership->type_of_ownership === 'RENT')
                    {{ "Rented" }}
                    @endif 
                @else
                    {{"Problem: Ownership needs to be assigned! as: Owned/Rednted"}}
                @endif
                </strong>
                
                by <a href="{{ url('/owners/' . $car->owner->id) }}" class="" title="View Car">{{$car->owner->first_name}} {{$car->owner->last_name}}</a></td></tr>

                <?php 
                    $runs = $car->runs;
                    $count = $runs->count();                    
                    $runs = array_sort($runs, function ($value) {
                        return $value['year'];
                    });
                    
                ?>


                <tr>
                <th> Runs </th>
                   
                <td>     
                <div id="accordion">
                    
                
                @foreach ($runs as $run)
                    


                        

                        <h4 class="h4">Year: <a href="{{ url('/runs/' . $run->id) }}" title="View Run"><em>{{ $run->year }}</em></a></h3>
                        
                        <div>
                             <ul class="list list-unstyled">
                                <li>First quarter: <strong>{{ $run->first_quarter }}</strong> Km. </li>
                                <li>Second quarter: <strong>{{ $run->second_quarter }}</strong> Km.</li>
                                <li>Third quarter: <strong>{{ $run->third_quarter }}</strong> Km.</li>
                                <li>Fourth quarter: <strong>{{ $run->fourth_quarter }}</strong> Km.</li>
                            </ul>
                        </div>
                        
                    



                @endforeach
                    
                    </div>

                </td>
                </tr>
                <tr>
                    <th> Image </th>
                    
                    <td> 
                    @foreach ($car->images as $image)
                        <img src="{{$image->file}}"> 
                    @endforeach
                    </td>

                </tr>
                
            </tbody>
        </table>
    </div>

    
      
    

@endsection
