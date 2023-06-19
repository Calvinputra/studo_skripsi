<div style="margin-top:24px;" class="row tab-pane fade" id="benefit" role="tabpanel">
        <p style="font-weight: 700;font-size: 18px;line-height: 22px;">
            Benefit beli kelas ini
        </p>
        <div class="row">
            @foreach($points as $point)
                <div class="col-sm-4">
                    <p style="font-weight: 400;font-size: 18px;line-height: 22px;">
                    {{ $point }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>