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
                    <a class="test" href="#" data-bs-toggle="modal" data-bs-target="#goalModalSetting{{ $lkey+1 }}">
                        <img src="{{ asset('/thumbnails/more_vert.png') }}" alt="">
                    </a>
                </div>
            </div>

            <!-- Goal Modal -->
            <div class="modal fade" id="goalModalSetting{{ $lkey+1 }}" tabindex="-1" aria-labelledby="goalModalSettingLabel{{ $lkey+1 }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-weight: bold" id="goalModalSettingLabel{{ $lkey+1 }}">Ubah Pengingat Belajar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('studo.update.setting.goal', $goal->id) }}" method="POST">
                                @csrf
                                <div style="">
                                    <input type="text" style="border-color:black;" name="subscription_id" value="{{ $goal->class_name }}" class="form-control" placeholder="{{ $goal->class_name }}" required disabled>
                                    <input type="hidden" name="goal_id" value="{{ $goal->id }}">
                                    <input type="hidden" name="class_id" value="{{ $goal->class_id }}">
                                        @if(auth()->check())
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label semibold fw-bold">Tanggal mulai belajar</label>
                                    <input type="date" style="border-color:black;" name="start_date" value="{{ $goal->start_date }}" class="form-control" placeholder="Start Date" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label semibold fw-bold">Tanggal selesai belajar</label>
                                    <input type="date" style="border-color:black;" name="end_date" value="{{ $goal->end_date }}" class="form-control" placeholder="End Date" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="fw-bold">Apa motivasimu?</label>
                                    <textarea class="form-control" name="notes" style="border-color:black;" placeholder="Apa goal yang ingin kamu capai?" rows="3" required>{{ $goal->notes }}</textarea>
                                </div>
                                <div style="float:right;">
                                    <button class="btn my-4 my-sm-0" style="color:white;background:#063852;" type="submit">
                                        <b>Simpan</b>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Goal Modal -->
        @endforeach
    @else
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
            Kamu belum memiliki Pengingat Belajar.
        </h2>
    @endif
</div>
