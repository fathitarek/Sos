<!DOCTYPE html>
@if ((gettype(app()->getLocale()) == 'array') == 1)

{{app()->setLocale('en')}}

@endif
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>SOS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/front/css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="/front/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="/front/css/style-ar.css">
        @endif

        @if(app()->getLocale() == 'en')
        <link rel="stylesheet" href="/front/css/style.css">
        @endif
        <script type="text/javascript" src="/front/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/front/js/bootstrap.js"></script>
        <script>
            window.Laravel = 
                <?php
                    echo json_encode([
                        'csrfToken' => csrf_token(),
                    ]);
                ?>
        </script>

        <!-- This makes the current user's id available in javascript -->
        @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
        @endif
    </head>
    <body>
        <?php
        $request_url = \Request::url();
        ?>
        <nav class="navbar navbar-default header1">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sos-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/front/img/sos-logo.png" alt="SOS logo"></a>
                </div>
                <div class="collapse navbar-collapse" id="sos-navbar">
                    <ul class="navbar-right main-ul">
                        <ul class="nav navbar-nav pages-links">


                            @if(app()->getLocale() == 'en')
                            @if(isset($menu))
                            @foreach($menu as $record)
                            <!--<li class="active"><a href="#">Home</a></li>-->
                            @if(strpos($request_url,'/en') && $record->display_name==='Home' )
                            <li class="active"><a href="{{$record->url}}" >{{$record->display_name}}</a></li>
                            @else
                            <li><a href="{{$record->url}}" >{{$record->display_name}}</a></li>
                            @endif
                            @endforeach
                            @endif
                            @endif

                            @if(app()->getLocale() == 'ar')
                            @if(isset($menu_ar))
                            @foreach($menu_ar as $record)
                            <!--<li class="active"><a href="#">Home</a></li>-->

                            @if(strpos($request_url,'/ar') && $record->display_name==='Home' )
                            <li class="active"><a href="{{$record->url}}" >{{$record->display_name}}</a></li>
                            @else
                            <li><a href="{{$record->url}}" >{{$record->display_name}}</a></li>
                            @endif
                            @endforeach
                            @endif
                            @endif
                        </ul>
                        <ul class="nav navbar-nav register-links">
                            <li><a href="{{ route('doctor.register') }}">{{ trans('words.login') }} <span class="black">
                                        |
                                    </span></a></li>
                            <li><a href="{{ route('doctor.login') }}">{{ trans('words.register') }}</a></li>
                        </ul>
                        <ul class="nav navbar-nav social-links">
                            @if(isset($setting))
                            @foreach($setting as $record)
                            <li>
                                <a href="{{$record->url}}"><img src="/upload/{{$record->logo}}" alt="{{$record->name}}"></a></li>
                            <!--	      	<li>
                                                    <a href="#"><img src="/front/img/linkedin-icon.png" alt="linked-icon"></a></li>
                                            <li>
                                                    <a href="#"><img src="/front/img/instagram-icon.png" alt="instagram-icon"></a>
                                            </li>-->
                            @endforeach
                            @endif
                        </ul>
                        <ul class="nav navbar-nav languages">
                            <li class="lang">
                                <a href="
                                   @if(app()->getLocale() == 'en')
                                   {{ route('switch' , ['lang' => 'ar']) }}
                                   @else
                                   {{ route('switch' , ['lang' => 'en']) }}
                                   @endif
                                   ">{{ trans('words.locale') }}
                                </a></li>
                        </ul>
                    </ul>

                </div>
            </div>
        </nav>
        
<div class="container-fluid">
	<div class="row">
		<div class="background-body" >

	</div>
	</div>
</div>
