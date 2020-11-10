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
    <title>QS - Maintenance</title>
    <link rel="canonical" href="{{ config('app.url') }}">
    <link rel="icon" href="/media/img/favicon.png">
    <link rel="stylesheet" href="/css/front.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body id="body-maintenance">
<main>
    <section class="row wrap">
        <div class="xLarge-12 large-12 medium-12 small-12 xSmall-12">
            <div class="padd-around">
                <p>Maintenance</p>
            </div>
        </div>
    </section>
</main>
</body>
</html>