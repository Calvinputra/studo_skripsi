@extends('studo.main')

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">
@section('content')
    <body class="antialiased">
        <!-- Modal Popup Login Form -->
        @include('studo.popup.login')
        <!-- End Modal Popup Login Form -->

       
        @include('studo.pages.site.section.HeroBanner')
        @include('studo.pages.site.section.rekomenKelas')
        @include('studo.pages.site.section.kelasTersedia')
    </body>
@endsection