<div class="row tab-pane fade" id="goals" role="tabpanel">
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
        Ubah Pengingat Belajar
    </h2>
    {{--
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
                        <label class="form-label semibold">Tanggal mulai belajar</label>
                        <input type="date" style="border-color:black;" name="start_date" value="{{ old('start_date') }}" class="form-control" placeholder="Start Date">
                    </fieldset>
                </div>
                <div class="col-sm-6">
                    <fieldset class="form-group">
                        <label class="form-label semibold">Tanggal selesai belajar</label>
                        <input type="date" style="border-color:black;" name="start_date" value="{{ old('start_date') }}" class="form-control" placeholder="Start Date">
                    </fieldset>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Apa motivasimu?</label>
                <textarea class="form-control" style="border-color:black;" placeholder="Apa goal yang ingin kamu capai?" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div style="float:right;>
                <button class="btn my-4 my-sm-0" style="color:white;background:#063852;" type="submit">
                    <b>
                        Simpan
                    </b>
                </button>
            </div>
        </form>
    --}}
    @foreach ($list_goals as $lkey => $goal)
    <div class="row" style="border-radius: 5px;border: 1px solid #E6EBED;padding:20px 10px; margin:0px 0px 16px 0px">
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

</div>