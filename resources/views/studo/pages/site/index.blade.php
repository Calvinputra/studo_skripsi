@extends('studo.main')

@section('header')
    @include('studo.includes.header')
    <!-- Modal Popup Login Form -->
    @include('studo.popup.login')
    <!-- End Modal Popup Login Form -->
    <!-- Modal Popup Login Form -->
    @include('studo.popup.register')
    <!-- End Modal Popup Login Form -->
@endsection

@section('content')
<body class="antialiased">
    @include('studo.pages.site.section.HeroBanner')
    @include('studo.pages.site.section.rekomenKelas')
    @include('studo.pages.site.section.kelasTersedia')
</body>
@endsection