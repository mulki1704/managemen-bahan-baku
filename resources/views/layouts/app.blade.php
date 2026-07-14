<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @vite([
        'resources/css/dashboard.css',
        'resources/js/app.js'
    ])
</head>

<body>

@include('layouts.sidebar')

<div class="main">

    @include('layouts.topbar')

    <div class="content">

        @yield('content')

    </div>



    
</div>

</body>
</html>