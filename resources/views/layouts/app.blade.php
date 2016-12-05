<!DOCTYPE html>
<?php

if (!Auth::guest()) {
    App::setLocale(Auth::user()->lang);
}
?>
<html lang="@if(!Auth::guest())
{{Auth::user()->lang}}
@else
{{'en'}}
@endif">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LGParking</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    




    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}"> --}}

    

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

</head>
<body id="app-layout" class="app-layout">


    <nav class="navbar navbar-default navbar-static-top">
        @if(Session::has('flash_message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
        @endif
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    LGParking
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <?php

                    
                    ?>
                    <li><a href="{{ url('/admin/users') }}">User Management</a></li>
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Database <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ url('/departments') }}" >Departments</a></li>
                        <li><a href="{{ url('/sections') }}" >Sections</a></li>
                        <li><a href="{{ url('/owners') }}" >Owners</a></li>
                        <li><a href="{{ url('/cars') }}">Cars</a></li>
                        <li><a href="{{ url('/ownerships') }}">Ownerships</a></li>
                        <li><a href="{{ url('/acts') }}">Acts</a></li>
                        <li><a href="{{ url('/contracts') }}">Contracts</a></li>
                        <li><a href="{{ url('/runs') }}">Runs</a></li>
                        <li><a href="{{ url('/technical-inspections') }}">Technical Inspections</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Search <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url('/main') }}" >Owner's view</a></li>
                    <li><a href="{{ url('/main2') }}" >Cars's view</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/languages') }}">Languages</a></li>
            
            
            
            
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
</nav>



@yield('content')

<!-- JavaScripts -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> --}}
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

<script src="{{ asset('js/all.js') }}"></script>
{{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


<script>
    $(document).ready(function() {
        $('#example2').DataTable();
    } );
</script>

<script>
    $( function() {
        $( "#accordion" ).accordion({
          collapsible: true
      });
    } );
</script>



</body>

<?php
// print_r(App::getLocale());
?>

</html>
