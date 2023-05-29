
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
                    <p>Tutor Panel</p>
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
                        <a class="nav-link" href="{{ route('internal_tutor.post.signout') }}">
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