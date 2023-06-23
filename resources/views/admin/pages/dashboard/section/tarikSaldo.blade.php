<style>

</style>
<div class="row tab-pane fade" id="tarikSaldo" role="tabpanel">
    <div class="row justify-content-center" style="margin-top:24px;">
        <div class="col-12 p-0">
            <div class="card shadow-2-strong" style="border:none;">
                <div style="padding:16px;">
                    <div class="card-body p-0">
                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                            <table id="myTableSaldo" class="table mb-0" style="background-color:white">
                                <thead style="background-color:rgba(32, 162, 235, 0.1);;border-radius: 5px;">
                                    <tr class="text-uppercase" style="color: white">
                                            <th scope="col" class="filter" data-filter="type">No</th>
                                            <th scope="col" class="filter" data-filter="name">Nama pengguna</th>
                                            <th scope="col" class="filter" data-filter="Bank">Bank</th>
                                            <th scope="col" class="filter text-center" data-filter="email">Email</th>
                                            <th scope="col" class="filter" data-filter="Handphone">Nomor Rekening</th>
                                            <th scope="col" class="filter text-center" data-filter="saldo">Saldo Pengajuan</th>
                                            <th scope="col" class="filter text-center" style="width:150px;"data-filter="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list_tarik_saldo as $lkey => $tarik_saldo)
                                        <tr>
                                            <td style="text-align:center;">{{ $lkey+1 }}</td>
                                            <td style="text-align:left;">{{ $tarik_saldo->name }}</td>
                                            <td style="text-align:center;">{{ $tarik_saldo->bank }}</td>
                                            <td style="text-align:center;">{{ $tarik_saldo->email }}</td>
                                            <td style="text-align:center;">{{ $tarik_saldo->account_number }}</td>
                                            <td style="text-align:center;width:50px;">Rp.{{ number_format($tarik_saldo->balance, 0, ',', '.') }}</td>
                                            <td style="text-align:center;">
                                            @if($tarik_saldo->status == 'waiting')
                                                <div class="d-flex">
                                                    <form class="pe-2" action="{{ route('studo.TarikSaldo.confirm', $tarik_saldo->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" style="color: #20A2EB; background: none; border: none; padding: 0; font: inherit; cursor: pointer; text-decoration: underline;">Konfirmasi</button>
                                                    </form>
                                                    <form id="tolakTarikSaldoForm-{{ $tarik_saldo->id }}" action="{{ route('studo.tarik.saldo.reject', $tarik_saldo->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" style="color: #20A2EB; background: none; border: none; padding: 0; font: inherit; cursor: pointer; text-decoration: underline;">Tolak</button>
                                                    </form>
                                                </div>
                                            @else
                                                <p style="color: green;">Done</p>
                                            @endif
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
<script>
    $(document).ready( function () {
        $('#myTableSaldo').DataTable();
    } );
    </script>