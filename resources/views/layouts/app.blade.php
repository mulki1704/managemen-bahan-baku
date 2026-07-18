<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIKERREL.ID - @yield('title', 'Dashboard')</title>

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

@stack('scripts')

<script>
document.getElementById('hamburgerBtn')?.addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('open');
});
</script>

</body>
</html>
