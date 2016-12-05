<!-- resources/views/main/index.blade.php -->

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-6">
            <div class="input-group">


                {!! Form::open(array('url' => 'login'))  !!}



                {{ Form::label('search', 'Search: ') }}
                {{ Form::text('search'), array(
                    'class' => 'form-control',
                    'placeholder' => 'Search for...') 
                }}


                {{ Form::button('', array(
                    'class' => 'btn btn-default glyphicon glyphicon-search',
                    'type' => 'submit')) 
                }}

                {{ Form::close() }}    

            </div>
        </div>
    </div>
</div>

<!-- TODO: Current Tasks -->
@endsection