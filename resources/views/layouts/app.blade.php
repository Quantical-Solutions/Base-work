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

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body id="body-admin" class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        {!! compileJsFiles() !!}
        <script type="text/javascript" src="/js/admin.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUAO0vWGrrKq74hdAI4D2zRNBHf3gRu5c"></script>
    </body>
</html>
