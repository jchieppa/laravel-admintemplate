<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dataTables.bootstrap4.css') }}" rel="stylesheet">


    <!-- Notification Styles -->
    @notify_css


    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}" ></script>
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Select2 -->
    <link href="{{ asset('assets/css/select2.css') }} " rel="stylesheet" />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


</head>
