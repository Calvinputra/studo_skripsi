@extends('carel.main')

@section('content')
    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;margin-top:40px;">            
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-8">
                    @include('carel.pages.setting_studo.profile')
                    @include('carel.pages.setting_studo.password')
                </div>
            </div>
        </div>
        
    </body>


@endsection