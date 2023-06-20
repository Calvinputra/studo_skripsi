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
    <div class="modal fade mid-modal" id="goalsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <!-- Modal content-->
            <div class="modal-content width-modal">
                <div class="modal-header" style="border-top-left-radius: 30% !important;border-top-right-radius:30%;">
                    <div style="display:flex; justify-content:space-between;align-items:center;width:100%;">
                        <div>
                            <p class="title-text-login modal-title black">
                                Atur Pengingat Belajar Kamu.
                            </p>
                        </div>
                        <div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="">
                            <select class="custom-select" id="inputGroupSelect02" style="border-color:black;">
                                <option selected>Kelas Lorem Ipsum</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="row" style="margin-top:24px;">
                            <div class="col-sm-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold fw-bold">Tanggal mulai belajar</label>
                                    <input type="date" style="border-color:black;" name="start_date" value="{{ old('start_date') }}" class="form-control" placeholder="Start Date">
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold fw-bold">Tanggal selesai belajar</label>
                                    <input type="date" style="border-color:black;" name="start_date" value="{{ old('start_date') }}" class="form-control" placeholder="Start Date">
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="fw-bold">Apa motivasimu?</label>
                            <textarea class="form-control" style="border-color:black;" placeholder="Apa goal yang ingin kamu capai?" id="exampleFormControlTextarea1" rows="3"></textarea>
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
