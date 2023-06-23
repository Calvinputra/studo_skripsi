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
                                                    <a href="{{ asset($nilai_proyek->photo) }}" style="color: #20A2EB;" download>
                                                        <u>
                                                            Unduh Proyek
                                                        </u>
                                                    </a>
                                                    <a href="#" style="color: #20A2EB;" data-bs-toggle="modal" data-bs-target="#beriNilaiModal{{ $lkey }}">
                                                        &nbsp;&nbsp;&nbsp;
                                                        <u>
                                                            Beri Nilai
                                                        </u>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit Nilai -->
                                        <div class="modal fade" id="beriNilaiModal{{ $lkey }}" tabindex="-1" aria-labelledby="beriNilaiModalLabel{{ $lkey }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="beriNilaiModalLabel{{ $lkey }}">Edit Nilai Proyek</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form edit nilai -->
                                                        <form action="{{ route('internal_tutor.post.beriNilaiProyek', $nilai_proyek->id) }}" method="POST">
                                                            @csrf
                                                            <!-- Input nilai proyek -->
                                                            <div class="mb-3">
                                                                <label for="score" class="form-label">Nilai Proyek</label>
                                                                <input type="number" class="form-control" id="score" name="score" min="0" max="100" value="{{ $nilai_proyek->score }}" required>
                                                            </div>
                                                            <input type="hidden" name="status" value="done">
                                                            <!-- Submit button -->
                                                            <button class="btn my-2 my-sm-0" style="color:white;background:#063852;width:100%;" type="submit">
                                                                <b>
                                                                    Simpan
                                                                </b>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
