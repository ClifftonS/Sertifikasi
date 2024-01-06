<table class="table table-hover table-bordered text-center table-striped align-middle">
    <thead class="table-dark align-middle">
        <tr>
            <th class="col-2" scope="col">Judul</th>
            <th class="col-2" scope="col">Nama Peminjam</th>
            <th class="col-2" scope="col">Tanggal Peminjaman</th>
            <th class="col-2" scope="col">Tanggal Harus Kembali</th>
            <th class="col-2" scope="col">Status</th>
            <th class="col-2" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datasend as $datatable)
            <tr>
                <td>{{ $datatable->judul }}</td>
                <td>{{ $datatable->nama }}</td>
                <td>{{ date('d-m-Y', strtotime($datatable->tgl_pmnj)) }}</td>
                <td>{{ date('d-m-Y', strtotime($datatable->tgl_kembali)) }}</td>
                <td>{{ $datatable->status_pmnj == 0 ? 'Masih Dipinjam' : 'Telah Dikembalikan' }}
                </td>
                <td>
                    {{-- <a data-bs-toggle="modal" data-bs-target="#Editpeminjaman"
                        data-id='{"idpmnj":"{{ $datatable->id_pmnj }}","tglpmnj":"{{ $datatable->tgl_pmnj }}","status":"{{ $datatable->status_pmnj }}","idbuku":"{{ $datatable->id_buku }}","idagt":"{{ $datatable->id_agt }}"}'
                        class="edit text-decoration-none"><i class="icon fa-solid fa-pen-to-square"></i></a> --}}
                    @if ($datatable->status_pmnj == 0)
                        <form action="/editpeminjaman" method="post">
                            @csrf
                            <input type="hidden" name="idpmnj" id="idpmnj" value="{{ $datatable->id_pmnj }}"
                                class="form-control-plaintext" style="border-radius: 10px;">
                            <input type="hidden" name="buku" id="buku" value="{{ $datatable->id_buku }}"
                                class="form-control-plaintext" style="border-radius: 10px;">
                            <input type="submit" class="btn shadow rounded"
                                style="background-color: #364F6B; color: white; width: 125px" value="Dikembalikan">
                        </form>
                    @else
                        <a data-bs-toggle="modal" data-bs-target="#Deletepeminjaman"
                            data-id='{"idpmnj":"{{ $datatable->id_pmnj }}"}' class="delete text-decoration-none"><i
                                class="icon fa-solid fa-trash-can"></i></a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
