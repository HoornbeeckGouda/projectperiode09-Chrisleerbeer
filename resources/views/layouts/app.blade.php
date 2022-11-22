@include('common.alert')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/17a01b966a.js" crossorigin="anonymous"></script>
        <title>Home</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="main">
        <div class="header">
            <div class="menu-left">
                <div class="menu-logo">
                    <a href="{{ route('home') }}"><img class="logo" src="{{ asset('storage/images/logo.png') }}"></a>
                </div>
                <div class="menu-links">
                    <a href="{{ route('books') }}">BOOKS</a>
                    <a href="./categories">SUBSCRIPTIONS</a>
                </div>
            </div>
            <div class="menu-right">
                <div class="menu-search">
                    <input class="search-bar" type="text" placeholder="Search book here..."> 
                    <i class="fa-solid fa-xl fa-magnifying-glass"></i>
                </div>
                <div class="menu-notifications">
                    <i class="fa-regular fa-xl fa-bell"></i>
                </div>
                <div class="menu-profile">
                    <i class="fa-solid fa-xl fa-user"></i>
                </div>
            </div>
        </div>

        @yield('content')
    </body>
</html>