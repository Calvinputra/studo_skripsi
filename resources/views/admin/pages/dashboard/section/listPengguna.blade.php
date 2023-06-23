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
                                    @foreach ($list_pengguna as $pkey => $pengguna)
                                        <tr>
                                            <td style="text-align:center;">{{ $pkey+1 }}</td>
                                            <td style="text-align:center;">{{ $pengguna->id }}</td>
                                            <td style="text-align:left;">{{ $pengguna->name }}</td>
                                            <td style="text-align:center;">{{ $pengguna->role_name }}</td>
                                            <td style="text-align:left;">{{ $pengguna->email }}</td>
                                            @if($pengguna->phone_number == null)
                                                <td style="text-align:center;">-</td>
                                            @else
                                                <td style="text-align:center;">{{ $pengguna->phone_number }}</td>
                                            @endif
                                            <td style="text-align:center;">
                                                <form action="{{ route('studo.deletePengguna', $pengguna->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" style="color: #20A2EB; background: none; border: none; padding: 0; font: inherit; cursor: pointer; text-decoration: underline;">Hapus</button>
                                                </form>
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
        $('#myTablePengguna').DataTable();
    } );
    </script>