<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <meta name="referrer" content="origin-when-cross-origin">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="canonical" href="{{ config('app.admin') }}">
    <link rel="icon" href="/media/img/favicon.png">
    <link rel="stylesheet" href="/css/admin.css" type="text/css">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js" integrity="sha256-TED/E3SGPvEvuKbvWC781am0/paerbpwFulbWXPBPds=" crossorigin="anonymous"></script>
</head>
<body id="body-admin" data-id="{{ Auth::id() }}" data-search="" class="">
<div id="opacityBG"></div>
<div class="wrapper connDisplay">
    @include('admin.common.header')
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                <span class="navbar-brand" href="javascript:;">
                    @yield('title')
                </span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <div class="navbar-form">
                        <form method="post" action="/recherche" class="input-group no-border">
                            @csrf
                            <input type="text" name="q" spellcheck="false" class="form-control searchInputs" placeholder="Recherche...">
                            <button disabled type="submit" class="btn btn-white btn-round btn-just-icon navSearch">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">
                                    Notifications
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                <a class="dropdown-item" href="#">Another Notification</a>
                                <a class="dropdown-item" href="#">Another One</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Administrateur
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="javascript:triggerPage('user');">Profil</a>
                                <a class="dropdown-item" href="javascript:triggerPage('emails');">Vos emails</a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Déconnexion</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <main class="content">
            <div id="mainLoader">
                <div class="loaderDiv" id="loaderDiv1"></div>
                <div class="loaderDiv" id="loaderDiv2"></div>
                <div class="loaderDiv" id="loaderDiv3"></div>
                <div class="loaderDiv" id="loaderDiv4"></div>
            </div>
            <div class="container-fluid" id="pageReplacer">
                @yield('content')
            </div>
        </main>
        @include('admin.common.footer')
    </div>
</div>
{!! compileJsFiles() !!}
<script type="text/javascript" src="/js/admin.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCVIy1EoINUFphAMvlJ5tGlXCjU_tTB2o"></script>
</body>
</html>