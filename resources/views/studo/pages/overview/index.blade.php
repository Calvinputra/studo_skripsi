@extends('studo.main')

<style>
.sidebar {
  position: -webkit-sticky;
  position: sticky;
  top: 25px;
  
}
</style>

@section('content')
    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;">            
            <div class="row">
                <div class="col-sm-8">
                    <div class="tab-content">
                        @if (auth()->check())
                            @include('studo.pages.overview.section.namaMentor')
                            @include('studo.pages.overview.section.tentangKelas')
                            @include('studo.pages.overview.section.project')

                        @else
                            @include('studo.pages.overview.section.namaMentor')
                            @include('studo.pages.overview.section.tentangKelas')
                            @include('studo.pages.overview.section.benefit')
                            @include('studo.pages.overview.section.review')
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    @if (!auth()->check())
                        @include('studo.pages.overview.section.floatingHarga')
                    @else
                        @include('studo.pages.overview.section.floatingMateri')
                    @endif
                </div>
            </div>
        </div>
    </body>
@endsection