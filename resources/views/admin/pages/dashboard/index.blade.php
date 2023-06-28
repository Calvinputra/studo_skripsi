@extends('admin.main')
<style>
            .active[aria-selected="true"]{
        background: #063852 !important;
        border-radius: 5px;
        color:white !important;
        padding: 10px;
}
.active[aria-selected="true"]:hover{
}

.active span{
    color:white !important;
}
th{
        color:#222222;
        text-align:center;
        font-weight:500;
    }
    .table thead th{
        border-top: none;
        text-align: center
    }
    table.dataTable thead .sorting{
    background-image: url("/thumbnails/both.png") !important;
    
}
</style>
@section('content')
<div class="container">
    <h2 class="title-text-login" style="margin:40px 0px;">
        Dashboard Admin
    </h2>
    <div style="margin-top:40px;">
            <ul class="nav">
                <div class="nav-item">
                    <a class="btn-overview active" style="color:#063852" id="nav-benefit-tab" data-bs-toggle="tab" href="#listKelas">
                        <b>
                            List Kelas
                        </b>
                    </a>
                </div>
                <div class="nav-item" style="margin-left:16px;">
                    <a class="btn-overview" style="color:#063852" id="nav-benefit-tab" data-bs-toggle="tab" href="#listPengguna">
                        <b>
                            List Pengguna
                        </b>
                    </a>
                </div>
                <div class="nav-item" style="margin:0px 16px;">
                    <a class="btn-overview" style="color:#063852" id="nav-review-tab" data-bs-toggle="tab" href="#tarikSaldo">
                        <b>
                            List Pengajuan Tarik Saldo
                        </b>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="btn-overview" style="color:#063852" id="nav-review-tab" data-bs-toggle="tab" href="#accSubscription">
                        <b>
                            List Pembelian Kelas
                        </b>
                    </a>
                </div>
            </ul>
    </div>
    <div>
        <div class="tab-content">
            @include('admin.pages.dashboard.section.listKelas')
            @include('admin.pages.dashboard.section.listPengguna')
            @include('admin.pages.dashboard.section.tarikSaldo')
            @include('admin.pages.dashboard.section.accSubscription')
        </div>

    </div>
</div>
@endsection