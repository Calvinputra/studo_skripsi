<div class="row tab-pane fade" id="goals" role="tabpanel">
    <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
        Ubah Goals
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
        <div class="row" style="border: 1px solid black;padding:20px 10px;">
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
                        {{ $goal->end_date }}
                    </p>
                </center>
            </div>
            <div class="col-sm-1">
                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 16C1.45 16 0.979167 15.8042 0.5875 15.4125C0.195833 15.0208 0 14.55 0 14C0 13.45 0.195833 12.9792 0.5875 12.5875C0.979167 12.1958 1.45 12 2 12C2.55 12 3.02083 12.1958 3.4125 12.5875C3.80417 12.9792 4 13.45 4 14C4 14.55 3.80417 15.0208 3.4125 15.4125C3.02083 15.8042 2.55 16 2 16ZM2 10C1.45 10 0.979167 9.80417 0.5875 9.4125C0.195833 9.02083 0 8.55 0 8C0 7.45 0.195833 6.97917 0.5875 6.5875C0.979167 6.19583 1.45 6 2 6C2.55 6 3.02083 6.19583 3.4125 6.5875C3.80417 6.97917 4 7.45 4 8C4 8.55 3.80417 9.02083 3.4125 9.4125C3.02083 9.80417 2.55 10 2 10ZM2 4C1.45 4 0.979167 3.80417 0.5875 3.4125C0.195833 3.02083 0 2.55 0 2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0C2.55 0 3.02083 0.195833 3.4125 0.5875C3.80417 0.979167 4 1.45 4 2C4 2.55 3.80417 3.02083 3.4125 3.4125C3.02083 3.80417 2.55 4 2 4Z" fill="#636466"/>
                </svg>
            </div>
        </div>
    @endforeach

</div>