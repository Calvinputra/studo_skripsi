@extends('studo.main')

@section('header')
    <!-- Modal Popup Login Form -->
    @include('studo.popup.login')
    <!-- End Modal Popup Login Form -->
    <!-- Modal Popup Login Form -->
    @include('studo.popup.register')
    <!-- End Modal Popup Login Form -->
    <!-- Modal Popup goals Form -->
    @include('studo.popup.goals')
    <!-- End Modal Popup goals Form -->
@endsection

@section('content')
<body class="antialiased">
    @include('studo.pages.site.section.HeroBanner')
    @include('studo.pages.site.section.rekomenKelas')
    @include('studo.pages.site.section.kelasTersedia')
</body>
@endsection