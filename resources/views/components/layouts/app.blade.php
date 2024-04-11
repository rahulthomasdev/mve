<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="{{asset('images/frontend/fevicon/fevicon.png')}}" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title ?? 'MVE' }}</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/custom_bootstrap.css')}}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- font awesome style -->
    <script src="https://kit.fontawesome.com/0e40cac554.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="{{asset('css/frontend/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('css/frontend/responsive.css')}}" rel="stylesheet" />
    @vite(['public/css/frontend/custom.scss', 'resources/css/app.css','resources/js/app.js'])

</head>

<body>
    @include('partials.header')
    <div>{{ $slot }}</div>
    @include('partials.footer')
</body>

</html>