<div class="modal fade" id="Editanggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Edit Anggota
                </h5>
            </div>
            <form action="/editanggota" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="idagt" class="col-form-label">Id Anggota</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="idagt" id="idagt" class="form-control-plaintext"
                                style="border-radius: 10px;" readonly>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="nama" class="col-form-label">Nama</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="nama" id="nama" class="form-control"
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Judul"
                                required>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="notelp" class="col-form-label">No Telp</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="notelp" id="notelp" class="form-control"
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Penulis"
                                required>
                        </div>
                    </div>

                    <div class="mt-3" style="margin-bottom: 5%"></div>
                    <div class="d-flex justify-content-center mb-4">

                        <input type="submit" class="btn shadow rounded"
                            style="background-color: #364F6B; color: white; width: 125px" value="Edit">
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
<script type="text/javascript">
    $('#Editanggota').on('show.bs.modal', function(e) {
        var idagt = $(e.relatedTarget).data('id').idagt;
        var nama = $(e.relatedTarget).data('id').nama;
        var notelp = $(e.relatedTarget).data('id').notelp;
        $(e.currentTarget).find('input[id="idagt"]').val(idagt);
        $(e.currentTarget).find('input[id="nama"]').val(nama);
        $(e.currentTarget).find('input[id="notelp"]').val(notelp);
    });
</script>
