@extends('carel.main')



@section('content')

    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;">            
            <div class="row">
                <div class="col-sm-8">
                    @include('carel.pages.overviewPage.namaMentor')
                    @include('carel.pages.overviewPage.tentangKelas')
                    @include('carel.pages.overviewPage.review')
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
    </body>


@endsection