<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .password-input {
            position: relative;
        }

        .password-input .password-icon {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
        .width-modal{
            width:600px;
        }
        .mid-modal{
            left:-100px !important;
        }
    </style>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade mid-modal" id="goalsBerhasilModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <!-- Modal content-->
            <div class="modal-content width-modal">
                <div class="modal-header" style="border-top-left-radius: 30% !important;border-top-right-radius:30%;">
                    <div style="display:flex; justify-content:space-between;align-items:center;width:100%;">
                        <div>
                            <p class="title-text-login modal-title black">
                                Atur Pengingat.
                            </p>
                        </div>
                        <div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="{{ asset('/thumbnails/reminder.png') }}" alt="">
                        </div>
                        <div class="col-sm-5">
                            <p>
                                Pengingat, berhasil di pasang!
                            </p>
                            <p>
                                Estimasi : 01/08/2023 - 01/09/2023 🔥 
                            </p>
                            <p>
                                Ini buat kalimat motivasi yang ditulis sebelumnya.
                            </p>
                            <button class="btn my-4 my-sm-0" style="color:white;background:#063852;width:100%;" type="submit">
                                <b>
                                    Simpan
                                </b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#toggle-password-login").click(function() {
            var input = $("#password-login");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
                $(this).removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                input.attr("type", "password");
                $(this).removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    </script>
</body>
