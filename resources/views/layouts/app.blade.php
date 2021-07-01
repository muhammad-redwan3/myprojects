<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('app.title') }} </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .btn-delete
        {
            background: url("/image/trash.svg");
            background-repeat:no-repeat;
            background-size:1.3rem 1.3rem ;
            padding-bottom: 0px;
            padding-top:0px;
            padding-left: 8px;
            border: 0px ;
            outline: none;
        }
        .checked
        {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/projects') }}">
                    {{ __('app.title') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    @if (app()->getLocale()=='en' || app()->getLocale() == 'tr')
                        <ul class="navbar-nav ml-auto menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
                    @else     
                        <ul class="navbar-nav mr-auto menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
                    @endif
                 
                        <!-- Authentication Links -->
                        @guest
                            @foreach(LaravelLocalization::getSupportedLocales() as  $localeCode => $properties)                   
                               <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <img src="{{ asset('flags/' . $localeCode . '.svg') }}" alt="" />
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if(auth()->user()->image!=null)
                                        <img class="rounded" src="{{asset('/uploads/'. auth()->user()->image)}}" width="50px" height="50px" alt="">
                                    @else
                                     {{('ملف الشخصي')}}
                                    @endif
                                 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                    <a href="/profile" class="dropdown-item">الملف الشخصي </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }}
                                    </a>

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

                @yield('content')
            </div>
           
        </main>
    </div>
</body>
</html>
