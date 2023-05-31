@extends('studo.main')

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">
@section('content')
    <body class="antialiased">
        <!-- Modal Popup Login Form -->
        @include('carel.popup.login')
        <!-- Modal Popup Register Form -->
        @include('carel.popup.register')
        <!-- Modal Popup Goals Form -->
        @include('carel.popup.goals')

       
        @include('studo.pages.site.section.HeroBanner')
        @include('studo.pages.site.section.rekomenKelas')
        @include('studo.pages.site.section.kelasTersedia')
    </body>
@endsection