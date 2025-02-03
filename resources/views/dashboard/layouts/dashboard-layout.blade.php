@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <title>{{ isset($title) ? $title . ' | ' : '' }} {{ config('app.name', '') }}</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/niceadmin.css') }}">
</head>

<body>
    @include('dashboard.layouts.partials.header')
    <main id="main" class="main">
        {{ $slot }}
    </main>
    @include('dashboard.layouts.partials.footer')
    <script src="{{ asset('assets/js/niceadmin.js') }}"></script>
</body>

</html>
