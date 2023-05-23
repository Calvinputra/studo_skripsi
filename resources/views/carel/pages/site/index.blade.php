@extends('carel.main')

<link href="{{ url('styles/font.css') }}" rel="stylesheet" type = "text/css">
@section('content')
    <body class="antialiased">
        <!-- Modal Popup Login Form -->
        @include('carel.popup.login')
        <!-- End Modal Popup Login Form -->

       
        @include('carel.pages.site.section.HeroBanner')
        @include('carel.pages.site.section.rekomenKelas')
        @include('carel.pages.site.section.kelasTersedia')
    </body>
@endsection