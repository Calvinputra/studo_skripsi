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
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_309_534" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                            <rect y="0.5" width="24" height="24" fill="#FFC100"/>
                            </mask>
                            <g mask="url(#mask0_309_534)">
                            <path d="M5 21.5V4.5H14L14.4 6.5H20V16.5H13L12.6 14.5H7V21.5H5Z" fill="#FFC100"/>
                            </g>
                            </svg>
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
    @else
        <h2 style="font-weight: 700;font-size: 32px;line-height: 39px;">
            Kamu belum memiliki Pengingat Belajar.
        </h2>
    @endif
</div>