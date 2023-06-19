@extends('studo.main')



@section('content')
<body class="antialiased">
    @if (auth()->check())
        @include('studo.pages.site.section.heroBanner')
        @include('studo.pages.site.section.lanjutkanKelas')
        @include('studo.pages.site.section.kelasTersedia')
    @else
        @include('studo.pages.site.section.heroBanner')
        @include('studo.pages.site.section.detailBanner')
        @include('studo.pages.site.section.kelasTersedia')
    @endif
</body>
@endsection
