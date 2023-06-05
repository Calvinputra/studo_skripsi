@extends('studo.main')



@section('content')
<body class="antialiased">
    @if (auth()->check())
        @include('studo.pages.site.section.HeroBanner')
        @include('studo.pages.site.section.lanjutkanKelas')
        @include('studo.pages.site.section.kelasTersedia')
    @else
        @include('studo.pages.site.section.HeroBanner')
        @include('studo.pages.site.section.rekomenKelas')
        @include('studo.pages.site.section.kelasTersedia')
    @endif
</body>
@endsection