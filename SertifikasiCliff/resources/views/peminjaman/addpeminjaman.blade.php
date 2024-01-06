<div class="modal fade" id="Tambahpmnj" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Buku
                </h5>
            </div>
            <form action="/addpeminjaman" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-4">
                            <label for="anggota" class="col-form-label">Nama Peminjam</label>
                        </div>
                        <div class="col-7">
                            <select class="form-select anggota" name="anggota" id="anggota"
                                aria-label="Default select example" required>
                                @if (count($anggota) == 0)
                                    <option>Tidak ada mahasiswa</option>
                                @endif
                                @foreach ($anggota as $agt)
                                    <option value="{{ $agt->id_agt }}">{{ $agt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-4">
                            <label for="buku" class="col-form-label">Nama Buku</label>
                        </div>
                        <div class="col-7">
                            <select class="form-select buku" name="buku" id="buku"
                                aria-label="Default select example" required>
                                @if (count($buku) == 0)
                                    <option>Tidak ada mahasiswa</option>
                                @endif
                                @foreach ($buku as $judulbuku)
                                    <option value="{{ $judulbuku->id_buku }}">{{ $judulbuku->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-4">
                            <label for="tglpmnj" class="col-form-label">Tanggal Peminjaman</label>
                        </div>
                        <div class="col-7">
                            <input type="date" name="tglpmnj" id="tglpmnj" class="form-control" value=""
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Tanggal"
                                required>
                        </div>
                    </div>

                    <div class="mt-3" style="margin-bottom: 5%"></div>
                    <div class="d-flex justify-content-center mb-4">

                        <input type="submit" class="btn shadow rounded"
                            style="background-color: #364F6B; color: white; width: 125px" value="Tambah">
                    </div>
                </div>
                {{-- <div class="modal-footer d-flex justify-content-center">
                </div> --}}
                <button type="button" class="btn-close position-absolute top-0 end-0 mx-auto" aria-label="Close"
                    data-bs-dismiss="modal"></button>
            </form>

        </div>
    </div>
</div>
