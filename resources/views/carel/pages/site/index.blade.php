@extends('carel.main')

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">
@section('content')
    <body class="antialiased">
        <!-- Modal Popup Login Form -->
        @include('carel.parts.popup.login')
        <!-- End Modal Popup Login Form -->

       
        @include('carel.pages.landingPage.HeroBanner')
        @include('carel.pages.landingPage.rekomenKelas')
        @include('carel.pages.landingPage.kelasTersedia')
    </body>
@endsection