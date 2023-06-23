<style>

</style>
<div class="row tab-pane active" id="listKelas" role="tabpanel">
    <div class="row justify-content-center" style="margin-top:24px;">
        <div class="col-12 p-0">
            <div class="card shadow-2-strong" style="border:none;">
                <div style="padding:16px;">
                    <div class="card-body p-0">
                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative;">
                            <table id="myTableKelas" class="table mb-0" style="background-color:white">
                                <thead style="background-color:rgba(32, 162, 235, 0.1);;border-radius: 5px;">
                                    <tr class="text-uppercase" style="color: white">
                                            <th scope="col" class="filter" data-filter="type">No</th>
                                            <th scope="col" class="filter" data-filter="email">Email</th>
                                            <th scope="col" class="filter" data-filter="name">Judul</th>
                                            <th scope="col" class="filter" data-filter="kategori">Kategori</th>
                                            <th scope="col" class="filter" data-filter="chapter">Total Chapter</th>
                                            <th scope="col" class="filter" data-filter="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_kelas as $lkey => $kelas) 
                                        <tr>
                                            <td style="text-align:center;">{{ $lkey+1 }}</td>
                                            <td style="text-align:center;">{{ $kelas->email }}</td>
                                            <td style="text-align:left;">{{ $kelas->name }}</td>
                                            <td style="text-align:center;">{{ $kelas->category }}</td>
                                            <td style="text-align:center;">{{ $kelas->total_chapters }}</td>
                                            <td style="text-align:center;">
                                                <form action="{{ route('studo.deleteKelas', $kelas->id) }}" method="POST">
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
        $('#myTableKelas').DataTable();
    } );
    </script>