{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'IS TADULAKO — Sistem Informasi Universitas Tadulako')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
          rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.webp') }}" type="image/webp">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('head')
    
<body class="bg-canvas text-ink overflow-x-hidden font-sans antialiased">

    @yield('content')

    @livewireScripts
    @yield('scripts')
</body>
</html>