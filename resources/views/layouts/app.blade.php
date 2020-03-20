<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')
<body>
    <div id="app">
        @include('layouts.partials.navbar')
        @include('layouts.partials.main-menu')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
