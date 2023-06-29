<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    {{-- Alpine JS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-background">
    {{-- Navbar Component --}}
    <livewire:navbar />

    {{-- Hero Component --}}

    {{-- Blurb/About with link to contact page --}}
    @yield('content')

    {{-- Footer Component --}}
    <livewire:footer />
</body>

</html>