@extends('carel.main')

<style>

</style>

@section('content')

    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;">            
            <div class="row">
                <div class="col-sm-8">
                    @include('carel.pages.overviewPage.namaMentor')
                    @include('carel.pages.overviewPage.tentangKelas')
                    @include('carel.pages.overviewPage.review')
                </div>
                <div class="col-sm-4">
                    <div style="margin-top:40px;background: rgba(255, 193, 0, 0.1);border-radius: 5px;padding: 24px;position:fixed;width:352px;">
                        <div style="display:flex;align-items:center;">
                            <span style="color:#063852;font-weight: 500;font-size: 24px;line-height: 29px;">Rp20.000&nbsp;</span>
                            <span style="text-decoration: line-through; font-size: 14px; color: grey">Rp250.000</span>
                        </div>
                            <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;background:#063852;width:100%;margin:24px 0px !important;" type="submit">
                                <b>
                                    Beli kelas
                                </b>
                            </button>
                            <div>
                                <p class="m-0">
                                    detail 1
                                </p>
                                <p class="m-0">
                                    detail 2
                                </p>
                                <p class="m-0">
                                    detail 3
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
    </body>


@endsection