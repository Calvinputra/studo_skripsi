@if(session('message'))
    <div class="row">
        <div class="alert alert-success alert-icon alert-dismissible fade show" role="alert">
            <i class="uil uil-check-circle"></i> {{ session('message') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif(session('error'))
    <div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
        <i class="uil uil-times-circle"></i> {{ session('error') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
            <i class="uil uil-times-circle"></i> {{ $error }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif