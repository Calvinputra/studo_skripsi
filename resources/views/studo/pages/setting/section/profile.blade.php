<div class="row tab-pane fade show active" id="profile" role="tabpanel">
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
        Edit Profil
    </h2>

    <form action="{{ route('studo.user.profile.update_photo', auth()->user()->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="">
            <input type="file" name="avatar" id="image_upload" accept=".png, .jpg, .jpeg" />
            @if ($user->avatar)
                <img style="margin-top: 40px; width:500px; height:500px" src="{{ asset('upload/files/img/avatar/300-' . $user->avatar) }}" alt="">
            @else
                <img style="margin-top: 40px;" src="https://via.placeholder.com/300" alt="">
            @endif
            <button class="btn my-4 my-sm-0 mx-4" style="color:white;background:rgba(6, 56, 82, 0.1);" type="submit">
                <b>
                    <p style="color:#063852;margin:0px;">
                        Ubah foto
                    </p>
                </b>
            </button>
        </div>
    </form>
    <form action="{{ route('studo.post.updateProfile', auth()->user()->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;margin-top:24px;">
                Nama lengkap
            </p>
            <input type="name" value="{{ old('name', $user->name) }}" placeholder="Nama" name="name" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
        </div>
        <div class="form-group" >
            <p  style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                Email
            </p>
            <input disabled type="email" value="{{ old('email', $user->email) }}" placeholder="Email" name="email" style="border: 1px solid black;border-radius:5px;" class="form-control" required="required">
        </div>
        <div class="form-group" >
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                Nomor Telepon
            </p>
            <input type="number" value="{{ old('phone_number', $user->phone_number) }}" placeholder="Nomor Telepon" name="phone_number" style="border: 1px solid black;border-radius:5px;" class="form-control">
        </div>
        <div style="float:right;">
            <button class="btn my-4 my-sm-0" style="color:white;background:#063852;" type="submit">
                <b>
                    Simpan
                </b>
            </button>
        </div>
    </form>
</div>
<script>
        $("#btnChoosePhotoProfileSetting").click(function() {
            $("#image_upload").click();
        })

        $('#image_upload').change(function() {
            $('#form-image').submit();
        });

        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        // Small using Select2 properties
        $("#location").select2({
            theme: "bootstrap-5",
            selectionCssClass: "select2--small", // For Select2 v4.1
            dropdownCssClass: "select2--small",
            width: '100%'
        });
</script>