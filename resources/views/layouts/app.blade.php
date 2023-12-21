<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
@include('partials.navbar')

<div class="container py-3">
    @if(session()->has('alert'))
        <div class="alert alert-success" role="alert"><span>{{ session()->get('alert') }}</span></div>
    @endif
    <h1 class="mb-3">@yield('title')</h1>

    @yield('content')
</div>

</body>
