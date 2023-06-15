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
                                            <th scope="col" class="filter" data-filter="e-wallet">E-Wallet</th>
                                            <th scope="col" class="filter text-center" data-filter="email">Email</th>
                                            <th scope="col" class="filter" data-filter="Handphone">No Handphone</th>
                                            <th scope="col" class="filter text-center" data-filter="saldo">Saldo Pengajuan</th>
                                            <th scope="col" class="filter text-center" style="width:150px;"data-filter="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;">1</td>
                                        <td style="text-align:left;">Jason Renata</td>
                                        <td style="text-align:center;">OVO</td>
                                        <td style="text-align:center;">jason.radasd@gmail.com</td>
                                        <td style="text-align:center;">0878803728392</td>
                                        <td style="text-align:center;width:50px;">Rp100.000</td>
                                        <td style="text-align:center;">
                                            <a href="#" style="color: #20A2EB;">Konfirmasi</a>
                                            &nbsp;&nbsp;<a href="#" style="color: #20A2EB;">Tolak</a>
                                        </td>
                                    </tr>
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