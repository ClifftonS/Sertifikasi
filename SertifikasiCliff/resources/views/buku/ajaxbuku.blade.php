<table class="table table-hover table-bordered text-center table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th class="col-2" scope="col">Judul</th>
            <th class="col-2" scope="col">Penulis</th>
            <th class="col-2" scope="col">Tahun Terbit</th>
            <th class="col-2" scope="col">Jumlah</th>
            <th class="col-2" scope="col">Gambar</th>
            <th class="col-2" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datasend as $datatable)
            <tr>
                <td>{{ $datatable->judul }}</td>
                <td>{{ $datatable->penulis }}</td>
                <td>{{ $datatable->tahun_terbit }}</td>
                <td>{{ $datatable->jumlah_tersedia }}</td>
                <td><img src="{{ URL::to('/') }}/assets/{{ $datatable->gambar }}"
                        class="col-10 img-fluid img-thumbnail rounded">
                </td>
                <td><a data-bs-toggle="modal" data-bs-target="#Editbuku"
                        data-id='{"idbuku":"{{ $datatable->id_buku }}","judul":"{{ $datatable->judul }}","penulis":"{{ $datatable->penulis }}","tahunterbit":"{{ $datatable->tahun_terbit }}","jumlahtersedia":"{{ $datatable->jumlah_tersedia }}","gambar":"{{ $datatable->gambar }}"}'
                        class="edit text-decoration-none"><i class="icon fa-solid fa-pen-to-square"></i></a>
                    |
                    <a data-bs-toggle="modal" data-bs-target="#Deletebuku"
                        data-id='{"idbuku":"{{ $datatable->id_buku }}"}' class="delete text-decoration-none"><i
                            class="icon fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
