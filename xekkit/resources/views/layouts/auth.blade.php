<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Styles -->
        <link rel="icon" 
            type="image/png" 
            href="../img/newlogo.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script defer src="https://kit.fontawesome.com/0f8556fd7f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href={{asset('css/colors/primary.css')}}> 
        <link rel="stylesheet" href={{asset('css/colors/secondary.css')}}>
        <link rel="stylesheet" href={{asset('css/colors/success.css')}}>
        <link rel="stylesheet" href={{asset('css/colors/danger.css')}}>
        <link rel="stylesheet" href={{asset('css/colors/warning.css')}}>
        <link rel="stylesheet" href={{asset('css/colors/info.css')}}>
        <link rel="stylesheet" href={{asset('css/colors/light.css')}}>
        <link rel="stylesheet" href={{asset('css/colors/dark.css')}}>
        <link rel="stylesheet" href={{asset('css/colors/light-dark.css')}}>
        <link rel="stylesheet" href={{asset('css/about_us.css')}}>
        <link rel="stylesheet" href={{asset('css/common.css')}}>
        <link rel="stylesheet" href={{asset('css/carousel.css')}}>
        <link rel="stylesheet" href={{asset('css/news_modal.css')}}>
        <link rel="stylesheet" href={{asset('css/search.css')}}>
        <script type="text/javascript">
            // Fix for Firefox autofocus CSS bug
            // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
        </script>
        <script type="text/javascript" src={{ asset('js/toast.js') }} defer>
        </script>
    </head>
    <body class="w-100">
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </body>
</html>
