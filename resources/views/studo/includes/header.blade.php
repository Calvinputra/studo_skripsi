
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
    .nav-item{
        display:grid;
        align-items:center;
    }
</style>
<head>
    <!-- ... -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
        <div>
            <nav class="navbar navbar-expand-lg bg-navbar">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between container" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="{{ route('studo.index') }}">
                        <img style="width:96px;height:40px;" src="{{ asset('/thumbnails/studo.png') }}" alt="">
                    </a>

                    <ul class="navbar-nav mt-2 mt-lg-0">
                    @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link nav-link-pengingatBelajar" href="" data-bs-toggle="modal" data-bs-target="#goalsModal" disabled>
                            <p class="m-0" style="color:#063852">
                                Pengingat Belajar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="hover-dashboard nav-link-kelasSaya" href="{{ route('studo.setting') }}">
                            <p class="m-0" style="color:#063852">
                                Kelas Saya
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn my-2 my-sm-0 dropdown-toggle" id="dropdownMenuButtonIconUser" data-bs-toggle="dropdown" aria-expanded="false" style="color:#063852; background:#E6EBED" type="button">
                                @if ($user->avatar)
                                    <img style="width: 30px;height: 30px;border-radius:100px;" class="" src="{{ asset($user->avatar) }}" alt="">
                                @else
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#D9D9D9"/>
                                    </svg>
                                @endif
                                <b>
                                    {{ auth()->user()->name }}
                                </b>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIconUser">
                                <a class="nav-link" href="{{ route('studo.setting') }}">
                                    <b>
                                        Pengaturan
                                    </b>
                                </a>
                                <a class="nav-link" href="{{ route('studo.post.signout') }}">
                                    <b>
                                        Keluar
                                    </b>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @php
        use App\Models\Subscription;
        if(auth()->check())
            {
                $check_user_class = Subscription::where('user_id', $user->id)
                ->where('status', 'paid')->first();
            }
    @endphp
    <script>
            $(document).ready(function() {
                // Cek apakah pengguna telah membeli kelas
                @if (auth()->check() && $check_user_class == null)
                    $('#goalsModal').on('show.bs.modal', function(e) {
                        e.preventDefault();
                        toastr.warning('Anda harus membeli kelas terlebih dahulu.', 'Peringatan');
                    });
                @endif

                // Fungsi untuk membuka goalsModal
                function openGoalsModal() {
                    $('#goalsModal').modal('show');
                }

                // Event listener untuk tombol yang membuka goalsModal
                $('.nav-link-pengingatBelajar').on('click', function(e) {
                    // Cek apakah pengguna telah membeli kelas
                    @if (auth()->check() && $check_user_class != null)
                        e.preventDefault();
                        openGoalsModal();
                    @endif
                });
            });
    </script>
    <script>
        // Fungsi untuk menutup modal login dan membuka modal daftar
        function openRegisterModal() {
            $('#loginModal').modal('hide'); // Menutup modal login
            $('#registerModal').modal('show'); // Membuka modal daftar
        }
        function openLoginModal() {
            $('#registerModal').modal('hide'); // Membuka modal daftar
            $('#loginModal').modal('show'); // Menutup modal login
        }
    
        // Menambahkan event listener pada tombol "Daftar" di modal login
        $(document).ready(function() {
            $('#loginModal').on('shown.bs.modal', function() {
                $('#registerBtn').click(function() {
                    openRegisterModal(); // Memanggil fungsi untuk menutup modal login dan membuka modal daftar
                });
            });
            $('#registerModal').on('shown.bs.modal', function() {
                $('#loginBtn').click(function() {
                    openLoginModal(); // Memanggil fungsi untuk menutup modal login dan membuka modal daftar
                });
            });
    
            // Fungsi untuk membersihkan form login ketika modal ditutup
            $('#loginModal').on('hidden.bs.modal', function() {
                $('#loginForm')[0].reset(); // Mengosongkan form login
            });
    
            // Fungsi untuk membersihkan form daftar ketika modal ditutup
            $('#registerModal').on('hidden.bs.modal', function() {
                $('#registerForm')[0].reset(); // Mengosongkan form daftar
            });
        });
    </script>
