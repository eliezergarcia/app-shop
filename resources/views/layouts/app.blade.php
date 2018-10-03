<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="{{ asset('img/apple-icon.png') }}" rel="apple-touch-icon" sizes="76x76">
        <title>
            @yield('title',  config('app.name'))
        </title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport"/>
        <!-- CSRF Token -->
        <meta content="{{ csrf_token() }}" name="csrf-token">
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="{{ asset('css/material-kit.min.css') }}" rel="stylesheet"/>
        @yield('styles')        
        <!-- CSS Just for demo purpose, don't include it in your project -->
        {{--
        <link href="{{ asset('css/material-kit.min.css') }}../assets/demo/demo.css" rel="stylesheet"/>
        --}}

    </head>
    <body class="@yield('body-class')">
        <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                    <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-toggle="collapse" type="button">
                        <span class="sr-only">
                            Toggle navigation
                        </span>
                        <span class="navbar-toggler-icon">
                        </span>
                        <span class="navbar-toggler-icon">
                        </span>
                        <span class="navbar-toggler-icon">
                        </span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                {{ __('Ingresar') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">
                                {{ __('Registro') }}
                            </a>
                            @endif
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                                {{ Auth::user()->name }}
                                <span class="caret">
                                </span>
                            </a>
                            <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/home">
                                    Dashboard
                                </a>
                                @if(auth()->user()->admin)
                                    <a class="dropdown-item" href="{{ url('admin/products') }}">
                                        Gestionar productos
                                    </a>
                                    <a class="dropdown-item" href="{{ route('categories.index') }}">
                                        Gestionar categorías
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        {{--
                        <li class="nav-item">
                            <a class="nav-link" data-original-title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" rel="tooltip" target="_blank" title="">
                                <i class="fa fa-twitter">
                                </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-original-title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" rel="tooltip" target="_blank" title="">
                                <i class="fa fa-facebook-square">
                                </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-original-title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" rel="tooltip" target="_blank" title="">
                                <i class="fa fa-instagram">
                                </i>
                            </a>
                        </li>
                        --}}
                    </ul>
                </div>
            </div>
        </nav>
        <div class="wrapper">
            @yield('content')
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('js/core/bootstrap-material-design') }}.min.js" type="text/javascript">
        </script>
        <script src="{{ asset('js/plugins/moment.min.js') }}">
        </script>
        <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
        <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript">
        </script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript">
        </script>
        <!--  Plugin for Sharrre btn -->
        <script src="{{ asset('js/plugins/jquery.sharrre.js') }}" type="text/javascript">
        </script>
        <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('js/material-kit.js') }}" type="text/javascript">
        </script>
        @yield('scripts')
    </body>
</html>
