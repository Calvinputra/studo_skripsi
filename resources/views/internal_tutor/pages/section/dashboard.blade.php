<style>
        .active-dashboard[aria-selected="true"]{
        background: #063852 !important;
        border-radius: 5px;
        color:white !important;
        padding: 10px;
}
.active-dashboard[aria-selected="true"]:hover{
}

.active-dashboard span{
    color:white !important;
}
th{
    color: #222222;
    text-align:center;
    font-size:14px;

}
td{
    text-align:center;

}
    table.dataTable, table.dataTable th, table.dataTable td{
        text-align:center;
    }

table.dataTable thead .sorting{
    background-image: url("/thumbnails/both.png") !important;
    
}
.padding-header {
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    white-space: nowrap !important;
}
</style>
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
                    {{ $sold_class }}
                </p>
                <p class="text-category m-0">
                    Kelas Terjual
                </p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="padding-header">
                <p class="header-text-category m-0">
                    Rp.{{ number_format($check_balance->balance, 3) }}
                </p>
                <p class="text-category m-0">
                    Total Saldo
                </p>
            </div>
        </div>
    </div>
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;margin-top:40px;">
        Kelas yang dimiliki
    </h2>
    <div>
        <div class="d-flex align-items-center" style="margin-top:18px;">
            <ul class="nav">
                <div class="nav-item">
                    <a class="btn-dashboard active-dashboard active" id="nav-dashboard-tab" data-bs-toggle="tab" href="#kelasAktif">
                        <b>
                            Kelas yang aktif
                        </b>
                    </a>
                </div>
                <div class="nav-item" style="margin:0px 16px;">
                    <a class="btn-dashboard active-dashboard" id="nav-dashboard-tab" data-bs-toggle="tab" href="#kelasDraft">
                        <b>
                            Draft Kelas
                        </b>
                    </a>
                </div>
            </ul>
        </div>
        <div class="tab-content">
            @include('internal_tutor.pages.section.kelasMilik')
            @include('internal_tutor.pages.section.kelasDraft')
        </div>
    </div>


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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Menangani peristiwa klik pada tab
  $('.nav-tabs .nav-item .btn-dashboard').click(function() {
    // Hapus kelas 'active-dashboard' dari semua tab
    $('.nav-tabs .nav-item .btn-dashboard').removeClass('active');
    
    // Tambahkan kelas 'active-dashboard' ke tab yang diklik
    $(this).addClass('active');
  });
});
</script>
