@extends('studo.main')
<style>

</style>
@section('content')
    <body class="antialiased">
        <div class="container" style="margin-bottom:40px;margin-top:40px;">            
            <div class="row">
                <div class="col-sm-4">
                    <ul class="nav" style="display:grid;">
                        <a  id="nav-profile-tab" data-bs-toggle="tab" href="#profile" style="text-decoration:none;">
                            <div style="background: #FFC100;padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 8C6.9 8 5.95833 7.60833 5.175 6.825C4.39167 6.04167 4 5.1 4 4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4C12 5.1 11.6083 6.04167 10.825 6.825C10.0417 7.60833 9.1 8 8 8ZM0 16V13.2C0 12.6333 0.145833 12.1125 0.4375 11.6375C0.729167 11.1625 1.11667 10.8 1.6 10.55C2.63333 10.0333 3.68333 9.64583 4.75 9.3875C5.81667 9.12917 6.9 9 8 9C9.1 9 10.1833 9.12917 11.25 9.3875C12.3167 9.64583 13.3667 10.0333 14.4 10.55C14.8833 10.8 15.2708 11.1625 15.5625 11.6375C15.8542 12.1125 16 12.6333 16 13.2V16H0Z" fill="white"/>
                                </svg>
                                    <span style="color:white;font-weight:700;">
                                        &nbsp;Profile
                                    </span>
                            </div>
                        </a>
                        <a  id="nav-password-tab" data-bs-toggle="tab" href="#password" style="text-decoration:none;">
                            <div style="background: rgba(255, 193, 0, 0.1);padding: 16px;height: 56px;border-radius: 5px;">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 8C6.9 8 5.95833 7.60833 5.175 6.825C4.39167 6.04167 4 5.1 4 4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4C12 5.1 11.6083 6.04167 10.825 6.825C10.0417 7.60833 9.1 8 8 8ZM0 16V13.2C0 12.6333 0.145833 12.1125 0.4375 11.6375C0.729167 11.1625 1.11667 10.8 1.6 10.55C2.63333 10.0333 3.68333 9.64583 4.75 9.3875C5.81667 9.12917 6.9 9 8 9C9.1 9 10.1833 9.12917 11.25 9.3875C12.3167 9.64583 13.3667 10.0333 14.4 10.55C14.8833 10.8 15.2708 11.1625 15.5625 11.6375C15.8542 12.1125 16 12.6333 16 13.2V16H0Z" fill="#222222"/>
                                </svg>
                                <span style="color:black;font-weight:700;">
                                    &nbsp;Ubah Password
                                </span>
                            </div>
                        </a>
                        <a  id="nav-goals-tab" data-bs-toggle="tab" href="#goals" style="text-decoration:none;">
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
                    </div>
                </div>
            </div>
        </div>
        
    </body>


@endsection