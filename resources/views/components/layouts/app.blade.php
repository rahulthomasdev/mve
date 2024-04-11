<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MVE</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/frontend/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/frontend/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/frontend/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/frontend/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/frontend/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/frontend/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/frontend/slicknav.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('sass/frontend/style.css')}}" type="text/css">

    @vite(['public/sass/frontend/custom.scss', 'resources/css/app.css','resources/js/app.js'])

</head>

<body>
    @include('partials.header')
    <div>{{ $slot }}</div>
    @include('partials.footer')
</body>

</html>