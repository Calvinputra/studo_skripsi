@extends('studo.main')
<style>
.active[aria-selected="true"]{
    background: #FFC100;
    border-radius: 5px;
    fill:white;
    color:white
}
.active[aria-selected="true"]:hover{
    background: #FFC100;
}
.active path{
    fill:white !important;
}
.active span{
    color:white !important;
}
.hover-dashboard:hover{
    background: rgba(255, 193, 0, 0.1);
    border-radius: 5px;
}
</style>
@section('content')
    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;margin-top:40px;">            
            <div class="row">
                <div class="col-sm-4">
                    <ul class="nav" style="display:grid;">
                        <a class="hover-dashboard"  id="nav-profile-tab" data-bs-toggle="tab" href="#profile" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path style="fill:black;" d="M8 8C6.9 8 5.95833 7.60833 5.175 6.825C4.39167 6.04167 4 5.1 4 4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4C12 5.1 11.6083 6.04167 10.825 6.825C10.0417 7.60833 9.1 8 8 8ZM0 16V13.2C0 12.6333 0.145833 12.1125 0.4375 11.6375C0.729167 11.1625 1.11667 10.8 1.6 10.55C2.63333 10.0333 3.68333 9.64583 4.75 9.3875C5.81667 9.12917 6.9 9 8 9C9.1 9 10.1833 9.12917 11.25 9.3875C12.3167 9.64583 13.3667 10.0333 14.4 10.55C14.8833 10.8 15.2708 11.1625 15.5625 11.6375C15.8542 12.1125 16 12.6333 16 13.2V16H0Z" fill="white"/>
                                </svg>
                                    <span style="color:black;font-weight:700;">
                                        &nbsp;Profile
                                    </span>
                            </div>
                        </a>
                        <a class="hover-dashboard"  id="nav-password-tab" data-bs-toggle="tab" href="#password" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 21C1.45 21 0.979167 20.8042 0.5875 20.4125C0.195833 20.0208 0 19.55 0 19V9C0 8.45 0.195833 7.97917 0.5875 7.5875C0.979167 7.19583 1.45 7 2 7H3V5C3 3.61667 3.4875 2.4375 4.4625 1.4625C5.4375 0.4875 6.61667 0 8 0C9.38333 0 10.5625 0.4875 11.5375 1.4625C12.5125 2.4375 13 3.61667 13 5V7H14C14.55 7 15.0208 7.19583 15.4125 7.5875C15.8042 7.97917 16 8.45 16 9V19C16 19.55 15.8042 20.0208 15.4125 20.4125C15.0208 20.8042 14.55 21 14 21H2ZM8 16C8.55 16 9.02083 15.8042 9.4125 15.4125C9.80417 15.0208 10 14.55 10 14C10 13.45 9.80417 12.9792 9.4125 12.5875C9.02083 12.1958 8.55 12 8 12C7.45 12 6.97917 12.1958 6.5875 12.5875C6.19583 12.9792 6 13.45 6 14C6 14.55 6.19583 15.0208 6.5875 15.4125C6.97917 15.8042 7.45 16 8 16ZM5 7H11V5C11 4.16667 10.7083 3.45833 10.125 2.875C9.54167 2.29167 8.83333 2 8 2C7.16667 2 6.45833 2.29167 5.875 2.875C5.29167 3.45833 5 4.16667 5 5V7Z" fill="#063852"/>
                                </svg>
                                <span style="color:black;font-weight:700;">
                                    &nbsp;Ubah Password
                                </span>
                            </div>
                        </a>
                        <a class="hover-dashboard"  id="nav-kelasSaya-tab" data-bs-toggle="tab" href="#kelasSaya" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="19" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 18V2H2V10H0V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H20C20.55 0 21.0208 0.195833 21.4125 0.5875C21.8042 0.979167 22 1.45 22 2V16C22 16.55 21.8042 17.0208 21.4125 17.4125C21.0208 17.8042 20.55 18 20 18ZM8 11C6.9 11 5.95833 10.6083 5.175 9.825C4.39167 9.04167 4 8.1 4 7C4 5.9 4.39167 4.95833 5.175 4.175C5.95833 3.39167 6.9 3 8 3C9.1 3 10.0417 3.39167 10.825 4.175C11.6083 4.95833 12 5.9 12 7C12 8.1 11.6083 9.04167 10.825 9.825C10.0417 10.6083 9.1 11 8 11ZM0 19V16.2C0 15.6333 0.145833 15.1125 0.4375 14.6375C0.729167 14.1625 1.11667 13.8 1.6 13.55C2.63333 13.0333 3.68333 12.6458 4.75 12.3875C5.81667 12.1292 6.9 12 8 12C9.1 12 10.1833 12.1292 11.25 12.3875C12.3167 12.6458 13.3667 13.0333 14.4 13.55C14.8833 13.8 15.2708 14.1625 15.5625 14.6375C15.8542 15.1125 16 15.6333 16 16.2V19H0Z" fill="#063852"/>
                                </svg>
                                <span style="color:black;font-weight:700;">
                                    &nbsp;Kelas Saya
                                </span>
                            </div>
                        </a>
                        <a class="hover-dashboard"  id="nav-goals-tab" data-bs-toggle="tab" href="#goals" style="text-decoration:none;">
                            <div style="padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 17V0H9L9.4 2H15V12H8L7.6 10H2V17H0Z" fill="#1C1B1F"/>
                                </svg>
                                <span style="color:black;font-weight:700;">
                                    &nbsp;Goals
                                </span>
                            </div>
                        </a>
                    </ul>
                </div>
                <div class="col-sm-8">
                    <div class="tab-content">
                        @include('studo.pages.setting.section.profile')
                        @include('studo.pages.setting.section.password')
                        @include('studo.pages.setting.section.goals')
                        @include('studo.pages.setting.section.kelasSaya')
                    </div>
                </div>
            </div>
        </div>
        
    </body>
@endsection