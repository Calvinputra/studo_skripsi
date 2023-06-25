<div class="row tab-pane fade" id="goals" role="tabpanel">
    @if(count($list_goals) > 0)
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
            Ubah Pengingat Belajar
        </h2>
        @foreach ($list_goals as $lkey => $goal)
            <div class="row" style="border-radius: 5px;border: 1px solid #E6EBED;padding:20px 10px; margin-bottom:16px;">
                <div class="col-sm-2">
                    <center>
                        <p class="m-0 text-kelas-baru">
                            Pengingat
                        </p>
                        <p class="m-0 text-kelas-baru">
                            {{ $lkey+1 }}
                        </p>
                    </center>
                </div>
                <div class="col-sm-6">
                    <p class="m-0 text-kelas-baru">
                        {{ $goal->class_name }}
                    </p>
                    <p class="m-0 text-kelas-baru" style="font-weight:500;margin-top:8px !important">
                        {{ $goal->notes }}
                    </p>
                </div>
                <div class="col-sm-2">
                    <center>
                        <p class="m-0">                   
                            {{ $goal->start_date }}
                            <br>
                            -
                            <br> 
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('/thumbnails/flag.png') }}" alt="">
                                {{ $goal->end_date }}
                            </div>
                        </p>
                    </center>
                </div>
                <div class="col-sm-1">
                    <img src="{{ asset('/thumbnails/more_vert.png') }}" alt="">

                </div>
            </div>
        @endforeach
    @else
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
            Kamu belum memiliki Pengingat Belajar.
        </h2>
    @endif
</div>