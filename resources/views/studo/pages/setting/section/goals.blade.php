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
                <div class="col-sm-3">
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
                    <button class="test" href="#" data-toggle="modal" data-target="#goalModalSetting{{ $lkey+1 }}">
                        <img src="{{ asset('/thumbnails/more_vert.png') }}" alt="">
                    </button>
                </div>
            </div>

            <!-- Goal Modal -->
            <div class="modal fade" id="goalModalSetting{{ $lkey+1 }}" tabindex="-1" role="dialog" aria-labelledby="goalModalSettingLabel{{ $lkey+1 }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="goalModalSettingLabel{{ $lkey+1 }}">Ubah Pengingat Belajar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('studo.post.goal') }}" method="POST">
                                @csrf
                                <!-- Form fields for goal update -->
                                <div class="form-group">
                                    <label for="startDate{{ $lkey+1 }}" class="fw-bold">Tanggal Mulai Belajar</label>
                                    <input type="date" name="start_date" id="startDate{{ $lkey+1 }}" class="form-control" value="{{ $goal->start_date }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="endDate{{ $lkey+1 }}" class="fw-bold">Tanggal Selesai Belajar</label>
                                    <input type="date" name="end_date" id="endDate{{ $lkey+1 }}" class="form-control" value="{{ $goal->end_date }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="notes{{ $lkey+1 }}" class="fw-bold">Motivasi</label>
                                    <textarea name="notes" id="notes{{ $lkey+1 }}" class="form-control" rows="3" required>{{ $goal->notes }}</textarea>
                                </div>
                                <!-- End form fields -->

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    {{-- </div>
                </div>
            </div> --}}
            <!-- End Goal Modal -->
        @endforeach
    @else
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
            Kamu belum memiliki Pengingat Belajar.
        </h2>
    @endif
</div>
