<div class="row tab-pane fade" id="nilaiProyek{{ $ckey }}" role="tabpanel">
    <div class="row justify-content-center" style="margin-top:24px;">
        <div class="col-12 p-0">
            <div class="card shadow-2-strong">
                <div style="padding:16px;">
                    <div class="card-body p-0">
                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                            <table id="myTableNilaiProyek" class="table mb-0" style="background-color: rgba(32, 162, 235, 0.1)">
                                <thead style="background-color: rgba(32, 162, 235, 0.1);border-radius: 5px;">
                                    <tr class="text-uppercase" style="color: white">
                                            <th scope="col" class="filter" data-filter="type">No</th>
                                            <th scope="col" class="filter" data-filter="name">Nama Pengguna</th>
                                            <th style="width:80px;" scope="col" class="filter" data-filter="duration">Nilai Post test</th>
                                            <th style="width:80px;" scope="col" class="filter" data-filter="priority">Nilai Proyek</th>
                                            <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list_nilai_proyek as $lkey => $nilai_proyek)
                                        <tr>
                                            <td>{{ $lkey+1 }}</td>
                                            <td style="text-align:left">{{ $nilai_proyek->user_name }}</td>
                                            @if($nilai_proyek->quest_score == null)
                                            <td style="text-align:center;">Belum mengerjakan</td>
                                            @else
                                            <td style="text-align:center;">{{ $nilai_proyek->quest_score == 100.0 ? number_format($nilai_proyek->quest_score, 0) : $nilai_proyek->quest_score }}/100</td>
                                            @endif
                                            @if($nilai_proyek->score == 0)
                                                <td>-</td>
                                            @else
                                                <td>{{ $nilai_proyek->score }}/100</td>
                                            @endif
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" style="color: #20A2EB;">
                                                        <u>
                                                            Unduh Proyek
                                                        </u>
                                                    </a>
                                                    <a href="#" style="color: #20A2EB;">&nbsp;&nbsp;&nbsp;
                                                        <u>
                                                            Edit Nilai
                                                        </u>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
