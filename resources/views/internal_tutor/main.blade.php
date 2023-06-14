<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    @section('header')
        @if (auth()->check())
            @include('internal_tutor.includes.header')
        @endif
    @endsection
        @if ($errors->any())
        <script>
            $(document).ready(function () {
                toastr.error("{{$errors->first()}}");
            });
        </script>
    @endif

    @yield('alerts')
    @yield('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('styles/font.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css/app.css') }}">
    <meta name="google-signin-client_id" content="942875105859-fh3uu63rjvn0gjrkp9m8gdabb583nq45.apps.googleusercontent.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    @yield('content')
    <script src="{{ asset('resources/js/app.js') }}"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        $(document).ready(function () {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}");
            @endif

            @if(Session::has('warning'))
                toastr.warning("{{ Session::get('warning') }}");
            @endif

            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        });
    </script>
</body>
</html>