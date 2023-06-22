
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
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#goalsModal">
                            <p class="m-0" style="color:#063852">
                                Pengingat Belajar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('studo.all') }}">
                            <p class="m-0" style="color:#063852">
                                Kelas Saya
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn my-2 my-sm-0 dropdown-toggle" id="dropdownMenuButtonIconUser" data-bs-toggle="dropdown" aria-expanded="false" style="color:#063852; background:#E6EBED" type="button">
                            <img style="width: 30px;height: 30px;border-radius:100px;" class="" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw0NDw0NDQ0NDQ0NDQ0NDQ0NDQ8IDQ0NFREWFhURExMYHSggGBolGxMTITEhJSkrOi4uFx8zODMsNygtLisBCgoKDQ0NDw0NDisZFRkrLSsrKzctKysrLSsrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIALcBEwMBIgACEQEDEQH/xAAYAAEBAQEBAAAAAAAAAAAAAAABAAIDBf/EABoQAQEBAQEBAQAAAAAAAAAAAAABEQISAyH/xAAXAQEBAQEAAAAAAAAAAAAAAAAAAQMC/8QAFREBAQAAAAAAAAAAAAAAAAAAABH/2gAMAwEAAhEDEQA/APDkJh8tHLJxqcnBGYfJxqQGZFjc5OAzjWEgzhw4YgzhkNhAYMaVijHkyNLACxoYDOCxtWAxikawgxixrEDFgx0xSA5eVHSQXn9BnqsWunXLN5Bzoa8s2CrUZEAkbi5jfkQSHDzGsBmcnG8ZkBRY1EAkWNIgzCUQFSIJEYosSQFUxAMFaVBmKwxAEcWAFhQMYsaSAsYrdZsBis1uxnAUSQDh0jny6SAWoDAIhQAwnFAjgBJIEqgBkUUIANAFCoYCCQJBAUlgIEAEkgqy1aADGNs0GcSQDiNs8NQGoRDAKWrFDKQtAhaQSSAIiAisQKJRAoRFQSSBJIEqiASVBkYUAxGioM1lqs0GaQgPDTHzbgNQggiiASKiSpBRJAkQCSUBGpAEUCRABEYCSQFAgxSkArNaCDFDdjOA56RhBfNuOfDpAajUZMAkJRNRlqAkkCMEpBBoADiQJGCgiydA6NBAhAEkYCSQMqpAEkDNZrbHSDKWIGOHTGeW9AtRmVqAUkoiCCIIKERAkkBSQKJKgkIQSIBUYUAKQIEAEQASSAZ6aooOaSActMctwGoRKYgSCoCGgIWpQoGAgqoBlLJApIAQQIQAggEQgILIJVIAiKArHVNrHVQSCBct4xy3ATUBAkICWdIIhKE4DaCCWgUNQNRCEBhQAoEAoEBo0gChqBFlaCtCCArFjdYtBamdQLl0jny3Aa0swgSEBSAFaCBiSUWpJBGDUo0NCBpMnQIWi0GhrKQatTKKNKDQBAANCgAmejaxQCBFXNa1z5rWiNynXONSg3p1g6DRZQNRM6NB01axq0G1WbVoHTrGkGkzq0GtWs6NBrVRo0GhRo6oNaZWJTKg2GdWqHVaxp0COgtACpmgNSoFXJSBStSpAZTqQi0pAFpQFaEA9HUgWmBAdWhAdGpANOpAhpQBFIHQkozp1IANKBmpIVm0JA//2Q==" alt="">
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
                                        keluar
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
