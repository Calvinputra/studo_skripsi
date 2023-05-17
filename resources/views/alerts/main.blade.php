@if(session('message'))
    <script>
        toastr.success('{{ session("message") }}');
    </script>
@elseif(session('error'))
    <script>
        toastr.error('{{ session("error") }}');
    </script>
@elseif(session('info'))
    <script>
        toastr.info('{{ session("info") }}');
    </script>
@elseif(session('survey_ams'))
    <script>
        toastr.info('{{ session("survey_ams") }}');
    </script>
@elseif(session('survey2'))
    <script>
        Swal.fire(
            "Terimakasih telah memberikan penilaian. ",
            "<b>Penilaian kamu sangat berharga bagi kami &#x1F609;</b>"
        )
    </script>
@elseif(session('error_confirm_email'))
    <script>
        toastr.options = {
            timeOut: 0,
            extendedTimeOut: 0,
            "positionClass": "toast-top-full-width",
            'closeButton':true
        };
        toastr.error('{{ session('error_confirm_email') }}');
    </script>
@elseif(session('already_paid'))
    <script>
        toastr.info('{{ session("already_paid") }}');
    </script>
@elseif(session('success_redeem'))
    <script>
        toastr.info('{{ session("success_redeem") }}');
    </script>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            toastr.options = {
                "closeButton": true,
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error('{{ $error }}');
        </script>
    @endforeach
@endif
