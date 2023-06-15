<style>

</style>
<div class="row tab-pane" id="listPengguna" role="tabpanel">
    <div class="row justify-content-center" style="margin-top:24px;">
        <div class="col-12 p-0">
            <div class="card shadow-2-strong" style="border:none;">
                <div style="padding:16px;">
                    <div class="card-body p-0">
                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                            <table id="myTablePengguna" class="table mb-0" style="background-color:white">
                                <thead style="background-color:rgba(32, 162, 235, 0.1);;border-radius: 5px;">
                                    <tr class="text-uppercase" style="color: white">
                                            <th scope="col" class="filter" data-filter="type">No</th>
                                            <th scope="col" class="filter" data-filter="identifikasi">ID</th>
                                            <th scope="col" class="filter" style="text-align:left" data-filter="name">Nama Pengguna</th>
                                            <th scope="col" class="filter" data-filter="Role">Role</th>
                                            <th scope="col" class="filter" data-filter="email">Email</th>
                                            <th scope="col" class="filter" data-filter="handphone">No Handphone</th>
                                            <th scope="col" class="filter" data-filter="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;">1</td>
                                        <td style="text-align:center;">1</td>
                                        <td style="text-align:left;">Jason Renata</td>
                                        <td style="text-align:center;">Pengguna</td>
                                        <td style="text-align:left;">jasonjason@gmail.com</td>
                                        <td style="text-align:center;">087773647282</td>
                                        <td style="text-align:center;">
                                            <a href="#" style="color: #20A2EB;">Hapus</a>
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
        $('#myTablePengguna').DataTable();
    } );
    </script>