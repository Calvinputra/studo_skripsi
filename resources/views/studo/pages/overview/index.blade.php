@extends('studo.main')

<style>
.sidebar {
  position: -webkit-sticky;
  position: sticky;
  top: 25px;
  
}
.dropdown-content-forum {
    display: none;
    position: absolute;
    border-color: #063852;
    background-color: white;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    padding: 2px 8px;
    width: 171px;
    height: auto;
    border-radius: 5px;
    margin-top: 5px;
}

.dropdown-content-forum a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content-forum a:hover {
    background-color: #ddd;
}

.dropdown-forum .dropbtn {
    cursor: pointer;
}

.dropdown-forum .dropbtn svg {
    fill: #636466;
}

.dropdown-forum .dropdown-content-forum {
    display: none;
}

.dropdown-forum .dropdown-content-forum.show {
    display: block;
}
</style>

@section('content')
<body class="antialiased">
        <div class="container" style="margin-bottom:40px;">            
            <div class="row">
                <div class="col-sm-8">
                    <div class="tab-content">
                        @if (auth()->check() && $subscription)
                            @include('studo.pages.overview.section.namaMentor')
                            @include('studo.pages.overview.section.tentangKelas')
                            @include('studo.pages.overview.section.forum')
                            @include('studo.pages.overview.section.project')
                            @include('studo.pages.overview.section.leaderboard')

                        @else
                            @include('studo.pages.overview.section.namaMentor')
                            {{-- @include('studo.pages.overview.section.tentangKelas') --}}
                            {{-- @include('studo.pages.overview.section.benefit') --}}
                            {{-- @include('studo.pages.overview.section.review') --}}
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    @if (auth()->check() && $subscription)
                        @include('studo.pages.overview.section.floatingMateri')
                    @else
                        @include('studo.pages.overview.section.floatingHarga')
                    @endif
                </div>
            </div>
        </div>
    </body>
@endsection