<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JustLogs') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  

    <!--Own Css-->


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>

    myc{
        width:90%;
        margin:auto;
    }
    mywrapper{
        padding:10px;
     
    }
    
    
    
    
    </style>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-inverse bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Justlogs') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            
                           <li class="nav-item">

                              <a href="/newsfeed" class="nav-link">{{__('NewsFeed')}}</a>

                          </li>

                          <li class="nav-item">

                              <a href="/my-posts" class="nav-link">{{__('Timeline')}}</a>

                          </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                           <li class="nav-item">

                                <a href="/posts" class="nav-link">{{__('NewsFeed')}}</a>

                            </li>

                            <li class="nav-item">

                                <a href="/my-posts" class="nav-link">{{__('Timeline')}}</a>

                            </li>


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="/home">Dashboard</a> 

                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>

                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

          <div class="container">

           <div class="myc">

           @include('inc.messages')
            @yield('content')


            </div>

            </div>
        </main>
    </div>
</body>
</html>
