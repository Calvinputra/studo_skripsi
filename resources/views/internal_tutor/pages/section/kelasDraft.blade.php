<div class="row tab-pane fade" id="kelasDraft" role="tabpanel">
    @if($count_classes != 0)
    @foreach ($classes as $class)
        @if($class->status == 'active')

        @else
        <form action="{{ route('internal_tutor.class.actived', $class->slug) }}"
            method="POST">
            @csrf
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
                    <p class="text-kelas-admin" style="margin-bottom:32px;">
                        {{ $class->name }}
                    </p>
                        <input type="hidden" name="status" value="active">
                        <button type="submit" class="btn-publish">
                            Publish Kelas
                        </button>
                    </b>
                </div>
            </div>
        </form>
        @endif
    @endforeach
    @else
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;margin-top:40px;">
        Tidak ada kelas yang dimiliki.
    </h2>
    @endif
</div>