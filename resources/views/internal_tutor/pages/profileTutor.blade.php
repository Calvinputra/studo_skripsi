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
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>
@section('content')
    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;margin-top:40px;">            
            <div class="row">
                <div class="col-sm-4">
                    <ul class="nav" style="display:grid;">
                        <a class="hover-dashboard active"  id="nav-profile-tab" data-bs-toggle="tab" href="#profile" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path style="fill:black;" d="M8 8C6.9 8 5.95833 7.60833 5.175 6.825C4.39167 6.04167 4 5.1 4 4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4C12 5.1 11.6083 6.04167 10.825 6.825C10.0417 7.60833 9.1 8 8 8ZM0 16V13.2C0 12.6333 0.145833 12.1125 0.4375 11.6375C0.729167 11.1625 1.11667 10.8 1.6 10.55C2.63333 10.0333 3.68333 9.64583 4.75 9.3875C5.81667 9.12917 6.9 9 8 9C9.1 9 10.1833 9.12917 11.25 9.3875C12.3167 9.64583 13.3667 10.0333 14.4 10.55C14.8833 10.8 15.2708 11.1625 15.5625 11.6375C15.8542 12.1125 16 12.6333 16 13.2V16H0Z" fill="white"/>
                                </svg>
                                    <span style="color:#063852;font-weight:700;">
                                        &nbsp;Profile
                                    </span>
                            </div>
                        </a>
                        <a class="hover-dashboard"  id="nav-saldo-tab" data-bs-toggle="tab" href="#saldo" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_172_683" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_172_683)">
                            <path d="M16 13.5C16.4333 13.5 16.7917 13.3583 17.075 13.075C17.3583 12.7917 17.5 12.4333 17.5 12C17.5 11.5667 17.3583 11.2083 17.075 10.925C16.7917 10.6417 16.4333 10.5 16 10.5C15.5667 10.5 15.2083 10.6417 14.925 10.925C14.6417 11.2083 14.5 11.5667 14.5 12C14.5 12.4333 14.6417 12.7917 14.925 13.075C15.2083 13.3583 15.5667 13.5 16 13.5ZM13 17C12.45 17 11.9792 16.8042 11.5875 16.4125C11.1958 16.0208 11 15.55 11 15V9C11 8.45 11.1958 7.97917 11.5875 7.5875C11.9792 7.19583 12.45 7 13 7H20C20.55 7 21.0208 7.19583 21.4125 7.5875C21.8042 7.97917 22 8.45 22 9V15C22 15.55 21.8042 16.0208 21.4125 16.4125C21.0208 16.8042 20.55 17 20 17H13ZM5 21C4.45 21 3.97917 20.8042 3.5875 20.4125C3.19583 20.0208 3 19.55 3 19V5C3 4.45 3.19583 3.97917 3.5875 3.5875C3.97917 3.19583 4.45 3 5 3H19C19.55 3 20.0208 3.19583 20.4125 3.5875C20.8042 3.97917 21 4.45 21 5H13C11.8167 5 10.8542 5.37083 10.1125 6.1125C9.37083 6.85417 9 7.81667 9 9V15C9 16.1833 9.37083 17.1458 10.1125 17.8875C10.8542 18.6292 11.8167 19 13 19H21C21 19.55 20.8042 20.0208 20.4125 20.4125C20.0208 20.8042 19.55 21 19 21H5Z" fill="#1C1B1F"/>
                            </g>
                            </svg>
                                <span style="color:#063852;font-weight:700;">
                                    &nbsp;Saldo
                                </span>
                            </div>
                        </a>
                        <a class="hover-dashboard"  id="nav-password-tab" data-bs-toggle="tab" href="#password" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 21C1.45 21 0.979167 20.8042 0.5875 20.4125C0.195833 20.0208 0 19.55 0 19V9C0 8.45 0.195833 7.97917 0.5875 7.5875C0.979167 7.19583 1.45 7 2 7H3V5C3 3.61667 3.4875 2.4375 4.4625 1.4625C5.4375 0.4875 6.61667 0 8 0C9.38333 0 10.5625 0.4875 11.5375 1.4625C12.5125 2.4375 13 3.61667 13 5V7H14C14.55 7 15.0208 7.19583 15.4125 7.5875C15.8042 7.97917 16 8.45 16 9V19C16 19.55 15.8042 20.0208 15.4125 20.4125C15.0208 20.8042 14.55 21 14 21H2ZM8 16C8.55 16 9.02083 15.8042 9.4125 15.4125C9.80417 15.0208 10 14.55 10 14C10 13.45 9.80417 12.9792 9.4125 12.5875C9.02083 12.1958 8.55 12 8 12C7.45 12 6.97917 12.1958 6.5875 12.5875C6.19583 12.9792 6 13.45 6 14C6 14.55 6.19583 15.0208 6.5875 15.4125C6.97917 15.8042 7.45 16 8 16ZM5 7H11V5C11 4.16667 10.7083 3.45833 10.125 2.875C9.54167 2.29167 8.83333 2 8 2C7.16667 2 6.45833 2.29167 5.875 2.875C5.29167 3.45833 5 4.16667 5 5V7Z" fill="#063852"/>
                                </svg>
                                <span style="color:#063852;font-weight:700;">
                                    &nbsp;Ubah Password
                                </span>
                            </div>
                        </a>
                    </ul>
                </div>
                <div class="col-sm-8">
                    <div class="tab-content">
                        @include('internal_tutor.pages.section.profile')
                        @include('internal_tutor.pages.section.password')
                        @include('internal_tutor.pages.section.saldo')
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    
@endsection