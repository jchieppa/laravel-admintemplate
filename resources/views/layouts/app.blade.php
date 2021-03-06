<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')
<body>
    <div id="app">
        @include('layouts.partials.navbar')
        @include('layouts.partials.main-menu')
        @include('layouts.partials.errors')
        <main class="py-4">
            @yield('content')
            @stack('javascript')
        </main>
    </div>
</body>
<!-- Notification Scripts -->
@notify_js
@include('layouts.partials.notifications')
</html>
