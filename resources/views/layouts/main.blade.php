<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    @include('layouts._head')
</head>
<body>
    @include('layouts._header')
    @include('layouts._nav')
    <main class="container py-5">
        @yield('content')
    </main>
    @include('layouts._footer')
    @include('layouts._scripts')
</body>
</html>