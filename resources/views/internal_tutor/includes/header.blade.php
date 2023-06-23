
<style>
    .bg-navbar{
        background:#E6EBED;
    }
    .form-inline .form-control{
        width:600px;
    }
    .btn-outline-darkblue:hover{
        background: #063852 !important;
        border-color:#063852 !important;
        color:white;
    }
</style>
        <div>
            <nav class="navbar navbar-expand-lg bg-navbar">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between container" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="{{ route('internal_tutor.index') }}">
                        <img style="width:96px;height:40px;" src="{{ asset('/thumbnails/studo.png') }}" alt="">
                    </a>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                    @if (auth()->check())
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('internal_tutor.index') }}">
                            <button class="btn my-2 my-sm-0"  style="color:#063852; border-color:#063852;background:#E6EBED" type="button">
                                <b>
                                    Dashboard
                                </b>
                            </button>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn my-2 my-sm-0 dropdown-toggle" id="dropdownMenuButtonIconTutor" data-bs-toggle="dropdown" aria-expanded="false" style="color:#063852; background:#E6EBED" type="button">
                                @if ($tutor->avatar)
                                    <img style="width: 30px;height: 30px;border-radius:100px;" class="" src="{{ asset($tutor->avatar) }}" alt="">
                                @else
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#D9D9D9"/>
                                    </svg>
                                @endif
                                <b>
                                    {{ auth()->user()->name }}
                                </b>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIconTutor">
                                <a class="nav-link" href="{{ route('internal_tutor.profileTutor') }}">
                                    Pengaturan
                                </a>
                                <a class="nav-link" href="{{ route('studo.post.signout') }}">
                                    Keluar
                                </a>
                            </div>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <button class="btn my-2 my-sm-0" data-bs-toggle="modal" data-bs-target="#loginModal" style="color:#063852; border-color:#063852;background:#E6EBED" type="button">
                                <b>
                                    Masuk
                                </b>
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <button class="btn my-2 my-sm-0 "data-bs-toggle="modal" data-bs-target="#registerModal" style="color:white;background:#063852;" type="button">
                                <b>
                                    Daftar
                                </b>
                            </button>
                        </a>
                    </li>
                    @endif
                </ul>
                </div>
            </nav>
        </div>