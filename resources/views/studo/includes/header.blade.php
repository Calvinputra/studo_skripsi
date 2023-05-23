
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
                    <a class="navbar-brand" href="#">Logo</a>
                    <div>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control" style="border-radius:5px 0px 0px 5px" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" style="color:white;background:#063852;height:37px; border-radius:0px 5px 5px 0px;" type="submit"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.14583 12.3708 1.8875 11.1125C0.629167 9.85417 0 8.31667 0 6.5C0 4.68333 0.629167 3.14583 1.8875 1.8875C3.14583 0.629167 4.68333 0 6.5 0C8.31667 0 9.85417 0.629167 11.1125 1.8875C12.3708 3.14583 13 4.68333 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.8125 10.5625 9.6875 9.6875C10.5625 8.8125 11 7.75 11 6.5C11 5.25 10.5625 4.1875 9.6875 3.3125C8.8125 2.4375 7.75 2 6.5 2C5.25 2 4.1875 2.4375 3.3125 3.3125C2.4375 4.1875 2 5.25 2 6.5C2 7.75 2.4375 8.8125 3.3125 9.6875C4.1875 10.5625 5.25 11 6.5 11Z" fill="#E6EBED"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                    @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('studo.setting') }}">
                        <button class="btn my-2 my-sm-0" style="color:#063852; border-color:#063852;background:#E6EBED" type="button">
                            <b>
                                {{ auth()->user()->name }}
                            </b>
                        </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('studo.post.signout') }}">
                            <button class="btn my-2 my-sm-0" style="color:white;background:#063852;" type="button">
                                <b>
                                    keluar
                                </b>
                            </button>
                        </a>
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