<style>

</style>
<div class="row tab-pane fade" id="accSubscription" role="tabpanel">
    <div class="row justify-content-center" style="margin-top:24px;">
        <div class="col-12 p-0">
            <div class="card shadow-2-strong" style="border:none;">
                <div style="padding:16px;">
                    <div class="card-body p-0">
                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                            <table id="myTableAccSubscription" class="table mb-0" style="background-color:white">
                                <thead style="background-color:rgba(32, 162, 235, 0.1);;border-radius: 5px;">
                                    <tr class="text-uppercase" style="color: white">
                                            <th scope="col" class="filter" data-filter="type">No</th>
                                            <th scope="col" class="filter" data-filter="name">Nama pengguna</th>
                                            <th scope="col" class="filter text-center" data-filter="email">Email</th>
                                            <th scope="col" class="filter" data-filter="Handphone">No Handphone</th>
                                            <th scope="col" class="filter text-center" data-filter="Saldo">Saldo Pengajuan</th>
                                            <th scope="col" class="filter text-center" data-filter="bukti">Bukti</th>
                                            <th scope="col" class="filter text-center" data-filter="status">Status</th>
                                            <th scope="col" class="filter text-center" style="width:150px;"data-filter="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($list_beli_kelas as $key => $beli_kelas)
                                            <tr>
                                            <td style="text-align:center;">{{ $key + 1 }}</td>
                                            <td style="text-align:left;">{{ $beli_kelas->name }}</td>
                                            <td style="text-align:center;">{{ $beli_kelas->email }}</td>
                                            <td style="text-align:center;">{{ $beli_kelas->phone_number }}</td>
                                            <td style="text-align:center;width:50px;">{{ $beli_kelas->price }}</td>
                                            <th scope="col" class="filter text-center" data-filter="bukti">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#buktiModal{{ $beli_kelas->id }}">
                                                    <img width="40" height="40" src="{{ asset($beli_kelas->photo) }}" alt="Foto Bukti">
                                                </a>
                                            </th>
                                            <td style="text-align:center;width:50px;">{{ $beli_kelas->status }}</td>
                                            <td style="text-align:center;">
                                                @if ($beli_kelas->status == 'paid')
                                                    <p style="color: green;">Done</p>
                                                @else
                                                <div class="d-flex">
                                                    <form class="pe-3" action="{{ route('studo.subscription.confirm', $beli_kelas->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" style="color: #20A2EB; background: none; border: none; padding: 0; font: inherit; cursor: pointer; text-decoration: underline;">Konfirmasi</button>
                                                    </form>
                                                    <form id="tolakForm-{{ $beli_kelas->id }}" action="{{ route('studo.subscription.reject', $beli_kelas->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" style="color: #20A2EB; background: none; border: none; padding: 0; font: inherit; cursor: pointer; text-decoration: underline;">Tolak</button>
                                                    </form>
                                                </div>
                                                @endif
                                            </td>
                                            <!-- Modal Bukti Pembayaran -->
                                            <div class="modal fade" id="buktiModal{{ $beli_kelas->id }}" tabindex="-1" aria-labelledby="buktiModal{{ $beli_kelas->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="buktiModal{{ $beli_kelas->id }}Label">Bukti Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset($beli_kelas->photo) }}" alt="Bukti Pembayaran" width="100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
<script>
    $(document).ready( function () {
        $('#myTableAccSubscription').DataTable();
    } );
</script>