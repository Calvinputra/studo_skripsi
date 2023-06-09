<div class="row tab-pane fade show active" id="profile" role="tabpanel">
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
        Edit Profil
    </h2>
    <form id="photo_form" action="{{ route('internal_tutor.post.profile.update_photo', auth()->user()->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="">
            <label for="image_upload" style="cursor: pointer;">
                <input type="file" name="avatar" id="image_upload" accept=".png, .jpg, .jpeg" style="display: none;" />
                @if ($tutor->avatar)
                    <img style="width: 100px;height: 100px;border-radius:100px;" src="{{ asset($tutor->avatar) }}" alt="">
                @else
                    <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50" fill="#D9D9D9"/>
                    </svg>
                @endif
            </label>
            <button class="btn my-4 my-sm-0 mx-4 btn-edit"type="button" onclick="selectImage()">
                <p style="color:#063852;margin:0px;">
                    Ubah foto
                </p>
            </button>
            <script>
                function selectImage() {
                    document.getElementById('image_upload').click();
                }

                document.getElementById('image_upload').addEventListener('change', function() {
                    document.getElementById('photo_form').submit();
                });
            </script>
        </div>
    </form>
    <form action="{{ route('internal_tutor.post.updateProfile', auth()->user()->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;margin-top:24px;">
                Nama lengkap
            </p>
            <input type="name" value="{{ old('name', $tutor->name) }}" placeholder="Nama" name="name" style="border: 1px solid black;border-radius:5px;" class="form-control">
        </div>
        <div class="form-group" >
            <p  style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                Email
            </p>
            <input disabled type="email" value="{{ old('email', $tutor->email) }}" placeholder="Email" name="email" style="border: 1px solid black;border-radius:5px;" class="form-control" ">
        </div>
        <div class="form-group" >
            <p style="font-style: normal;font-weight: 700;font-size: 16px;line-height: 19px;color:black;">
                Nomor Telepon<i style="color:#EB2020;">*</i>
            </p>
            <input type="text" id="phone_number" value="{{ old('phone_number', $tutor->phone_number) }}" placeholder="08XXXXXXX" name="phone_number" style="border: 1px solid black;border-radius:5px;" class="form-control">
            <p id="phone_number_error" style="display: none; color: red;">Nomor telepon harus diawali dengan 08 dan minimal 10 angka.</p>
        </div>

        <div style="float:right">
            <button id="save_button" class="btn my-4 my-sm-0" style="color:white;background:#063852;" type="submit" disabled>
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
<script>
    const phoneNumberInput = document.getElementById('phone_number');
    const phoneNumberError = document.getElementById('phone_number_error');
    const saveButton = document.getElementById('save_button');

    function validatePhoneNumber() {
        const value = phoneNumberInput.value;
        if (!/^08/.test(value) || value.length < 10) {
            phoneNumberError.style.display = 'block';
            saveButton.disabled = true;
        } else {
            phoneNumberError.style.display = 'none';
            saveButton.disabled = false;
        }
    }

    phoneNumberInput.addEventListener('input', validatePhoneNumber);

    phoneNumberInput.addEventListener('keypress', function(event) {
        if (event.which < 48 || event.which > 57) {
            event.preventDefault();
        }
    });

    // Run validation on page load in case there is already a value in the input field
    validatePhoneNumber();
</script>