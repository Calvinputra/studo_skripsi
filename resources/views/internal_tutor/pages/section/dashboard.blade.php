<div class="row tab-pane fade show active" id="profile" role="tabpanel">
    <div class="row">
        <div class="col-sm-3">
            <div class="padding-header" style="width: 160px;">
                <p class="header-text-category m-0">
                    {{ $count_classes }}
                </p>
                <p class="text-category m-0">
                    Kelas
                </p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="padding-header" style="width: 160px;">
                <p class="header-text-category m-0">
                    20
                </p>
                <p class="text-category m-0">
                    Kelas Terjual
                </p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="padding-header">
                <p class="header-text-category m-0">
                    Rp85.000
                </p>
                <p class="text-category m-0">
                    Total Saldo
                </p>
            </div>
        </div>
    </div>
    @if($count_classes != 0)
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;margin-top:40px;">
            Kelas yang dimiliki
        </h2>
        @foreach ($classes as $class)
            <div class="row" style="margin:24px 0px;">
                <div class="col-sm-4">
                    <a class="hover-img" href="{{ route('internal_tutor.class.informasi.edit', $class->slug) }}">
                        <img style="width: 100%;height:144px;margin:0px;"
                            src="/thumbnails/{{$class->thumbnail}}"
                            alt="">                        
                        <div class="middle">
                            <div class="text hover-text-card" style="color: #063852">Edit Kelas</div>
                        </div>            
                    </a>
                </div>
                <div class="col-sm-7">
                    <p class="text-kelas-admin">
                        {{ $class->name }}
                    </p>
                    <div class="row">
                        <div class="col-sm-3">
                            <p>
                                Total user
                            </p>
                        </div>
                        <div class="col-sm-9">
                            <p style="">
                                : 20 User
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p>
                                Pendapatan
                            </p>
                        </div>
                        <div class="col-sm-9">
                            <p style="">
                                : Rp350.000
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 16C1.45 16 0.979167 15.8042 0.5875 15.4125C0.195833 15.0208 0 14.55 0 14C0 13.45 0.195833 12.9792 0.5875 12.5875C0.979167 12.1958 1.45 12 2 12C2.55 12 3.02083 12.1958 3.4125 12.5875C3.80417 12.9792 4 13.45 4 14C4 14.55 3.80417 15.0208 3.4125 15.4125C3.02083 15.8042 2.55 16 2 16ZM2 10C1.45 10 0.979167 9.80417 0.5875 9.4125C0.195833 9.02083 0 8.55 0 8C0 7.45 0.195833 6.97917 0.5875 6.5875C0.979167 6.19583 1.45 6 2 6C2.55 6 3.02083 6.19583 3.4125 6.5875C3.80417 6.97917 4 7.45 4 8C4 8.55 3.80417 9.02083 3.4125 9.4125C3.02083 9.80417 2.55 10 2 10ZM2 4C1.45 4 0.979167 3.80417 0.5875 3.4125C0.195833 3.02083 0 2.55 0 2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0C2.55 0 3.02083 0.195833 3.4125 0.5875C3.80417 0.979167 4 1.45 4 2C4 2.55 3.80417 3.02083 3.4125 3.4125C3.02083 3.80417 2.55 4 2 4Z"
                            fill="#636466" />
                    </svg>
                </div>
            </div>
        @endforeach
    @else
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;margin-top:40px;">
            Tidak ada kelas yang dimiliki.
        </h2>
    @endif

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
