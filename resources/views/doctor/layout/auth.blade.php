<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>-->
        <title> SOS Doctor</title>
        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel =
            <?php
              echo json_encode([
                'csrfToken' => csrf_token(),
                ]);
              ?>
        </script>
        @if(!Auth::guest())
        <script>
            window.Laravel.userId = <?php echo Auth::user()->id; ?>
        </script>
        @endif

    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
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
                    <!--                <a class="navbar-brand" href="{{ url('/doctor') }}">-->
                    <a class="navbar-brand">Doctor</a>

                    <!--                </a>-->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/doctor/login') }}">Login</a></li>
                        <li><a href="{{ url('/doctor/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/doctor/logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/doctor/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="wrapper" id="notification">
            <div class="alert alert-info" role="alert" >
                <!--                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>-->
                <p id="message"></p>

                @auth()
                {!! Form::open(['action'=>'DoctorController@acceptVisit','files' => true]) !!}
                <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}" >
                <input type="hidden" name="accept" value="1" >
                <input type="hidden" id="patient_id" name="patient_id" >
                @include('admin.form_parcials.submit_btn',['submit_btn_text'=>'Accept'])
                {!! Form::close() !!}
                <div style="display: inline">
                 {!! Form::open(['action'=>'DoctorController@cancelVisit','files' => true]) !!}
                <input type="hidden" name="doctor_id" value="{{Auth::user()->id}}" >
                @include('admin.form_parcials.submit_btn',['submit_btn_text'=>'Cancel'])
                {!! Form::close() !!}
                </div>
                @endauth
            </div>
        </div>
        @yield('content')

        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
</html>
