<!doctype html>
<html lang="{{ app()->getLocale() }}" class="weather-page">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">

        <title>Weather</title>

    </head>
    <style>
    </style>
    <body>
    <div class="container fullScreen">
            <h1 class="display-1"><strong class="text">Bryansk</strong></h1>
            <p class=""><strong class="text fontsize">{{ $temperature }} °С</strong></p>
    </div>
    </body>
</html>
