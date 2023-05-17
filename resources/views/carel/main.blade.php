<head>
    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    @section ('header')
        @include('carel.includes.header')
    @endsection

    @yield('header')
    @yield('content')

</head>