<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('img/Logo web 4.png')}}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .code {
            color: #f48942;
            border-right: 4px solid;
            font-size: 60px;
            padding: 0 15px 0 15px;
            text-align: center;
        }

        .message {
            font-size: 18px;
            text-align: center;
        }
        .titulo{
            font-size: 40px;
            background: linear-gradient(to top,  #f48942 -5%, #ba6832 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-right: 50px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <h1 class="titulo">HousingBook </h1>
    <div class="code">
       <strong>@yield('code')</strong>
    </div>

    <div class="message" style="padding: 10px;">
        @yield('message_esp')
    </div>
    <div class="message" style="padding: 10px;">
        @yield('message_en')
    </div>
</div>
</body>
</html>
