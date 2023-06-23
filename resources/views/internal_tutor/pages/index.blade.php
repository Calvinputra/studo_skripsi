@extends('internal_tutor.main')
<style>
    .active[aria-selected="true"]{
        background: #20A2EB;
        border-radius: 5px;
        fill:white;
        color:white
    }
    .active[aria-selected="true"]:hover{
        background: #20A2EB;
    }
    .active path{
        fill:white !important;
    }
    .active span{
        color:white !important;
    }
    .hover-dashboard:hover{
        background: rgba(32, 162, 235, 0.1);
        border-radius: 5px;
    }
    .middle {
        top: 70px !important;
    }

    a{
        text-decoration:none !important;
    }


    .hover-img:hover .middle {
        opacity: 1;
    }

    .hover-img:hover img {
        opacity: 1;
        filter: brightness(70%);
    }

    .text {
        border: 1px solid black;
        border-radius: 5px;justify-content: center;
        align-items: center;
        padding: 10px 16px;
        width:150px;
    }
      table td,
    table th {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .card {
        border-radius: .5rem;
    }
table.dataTable thead th, table.dataTable thead td{
    border-bottom: none !important;
    text-align:center;
}

table.dataTable.no-footer{
    border-bottom:1px solid #E6EBED !important;
}

    .table-scroll {
        border-radius: .5rem;
    }

    thead {
        top: 0;
        position: sticky;
    }

    .active[aria-selected="true"] {
        background: #20A2EB;
        border-radius: 5px;
        fill: white;
        color: white
    }

    .active[aria-selected="true"]:hover {
        background: #20A2EB;
    }

    .active path {
        fill: white !important;
    }

    .active span {
        color: white !important;
    }

    .hover-dashboard:hover {
        background: rgba(32, 162, 235, 0.1);
        border-radius: 5px;
    }

    [value=Video] {
        display: none;
    }


    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #063852;
        font-weight: 700;
        border-bottom: 3px #063852 solid !important;

    }

    .nav-tabs .nav-link {
        color: #063852;
        font-weight: 400;
        border-radius: 0px !important;
        border: none;
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        border-bottom: 1px #063852 solid;
        cursor: pointer;
    }
    .table-scroll{
        border-radius: 0px !important;
    }

    .nav-link {
        color: #063852 !important;
    }
    th{
        text-align:center;
    }
    table.dataTable, table.dataTable th, table.dataTable td{
        text-align:center;
    }
</style>
@section('content')
    <div class="container" style="margin-bottom:40px;margin-top:40px;">        
        <div class="row">
            <div class="col-sm-4">
                <div class="d-flex" style="background: rgba(32, 162, 235, 0.1);border-radius: 5px; padding:16px;">
                    @if($tutor->avatar)
                        <img style="width: 60px;height:60px;margin:0px;" src="{{ asset($tutor->avatar) }}" alt="">
                    @else
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="30" fill="#D9D9D9"/>
                        </svg>
                    @endif
                    <div style="margin-left:16px;display:grid; align-items:center;">
                        <p class="desc-text-login m-0">
                            {{ $tutor->name }}
                        </p>
                        <p class="m-0">
                            Tutor
                        </p>
                    </div>
                </div>    
                <div style="margin-top:16px;">
                    <a class="btn my-2 my-sm-0" style="color:white;background:#063852;width:100%;" href="{{ route('internal_tutor.profileTutor') }}" role="button">
                        <b>
                            Tarik Saldo
                        </b>
                    </a>
                </div>

                {{-- <ul class="nav" style="display:grid;">
                    <a class="hover-dashboard active"  id="nav-profile-tab" data-bs-toggle="tab" href="#profile" style="text-decoration:none;">
                        <div style="padding: 16px;height: 56px;border-radius: 5px;">
                            <svg width="19" height="21" viewBox="0 0 19 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path style="fill:black" d="M14.5 21L13.1 17.9L10 16.5L13.1 15.1L14.5 12L15.9 15.1L19 16.5L15.9 17.9L14.5 21ZM0 18V6L8 0L16 6V10.175C15.75 10.1083 15.4958 10.0625 15.2375 10.0375C14.9792 10.0125 14.725 10 14.475 10C12.6583 10 11.125 10.6333 9.875 11.9C8.625 13.1667 8 14.7 8 16.5C8 16.75 8.0125 17 8.0375 17.25C8.0625 17.5 8.10833 17.75 8.175 18H0Z" fill="white"/>
                            </svg>
                            <span style="color:black;font-weight:700;">
                                &nbsp;Dashboard
                            </span>
                        </div>
                    </a>
                </ul> --}}
                <div style="border: 1px solid #E6EBED;margin:24px 0px;">
                </div>
                <div class="form-group">
                    <div  style="justify-content: center;align-items: center;">

                        <a  href="{{ route('internal_tutor.class.informasi') }}" class="button-text-login btn-masuk" style="text-decoration:none;display:flex;border: 1px solid #063852;border-radius: 5px;width:100%;color:#063852; border-color:#063852;background:white">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.5 15H11.5V11H15.5V9H11.5V5H9.5V9H5.5V11H9.5V15ZM10.5 20C9.11667 20 7.81667 19.7375 6.6 19.2125C5.38333 18.6875 4.325 17.975 3.425 17.075C2.525 16.175 1.8125 15.1167 1.2875 13.9C0.7625 12.6833 0.5 11.3833 0.5 10C0.5 8.61667 0.7625 7.31667 1.2875 6.1C1.8125 4.88333 2.525 3.825 3.425 2.925C4.325 2.025 5.38333 1.3125 6.6 0.7875C7.81667 0.2625 9.11667 0 10.5 0C11.8833 0 13.1833 0.2625 14.4 0.7875C15.6167 1.3125 16.675 2.025 17.575 2.925C18.475 3.825 19.1875 4.88333 19.7125 6.1C20.2375 7.31667 20.5 8.61667 20.5 10C20.5 11.3833 20.2375 12.6833 19.7125 13.9C19.1875 15.1167 18.475 16.175 17.575 17.075C16.675 17.975 15.6167 18.6875 14.4 19.2125C13.1833 19.7375 11.8833 20 10.5 20Z" fill="#063852"/>
                        </svg>&nbsp;&nbsp;Buat Kelas Baru</a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-8">
                <div class="tab-content">
                    @include('internal_tutor.pages.section.dashboard')
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready( function () {
        $('#myTableNilaiProyek').DataTable();
    } );
</script>
@endsection