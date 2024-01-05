<div class="modal fade" id="Editbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Edit Buku
                </h5>
            </div>
            <form action="/editbuku" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="nim" class="col-form-label">Id Buku</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="idbuku" id="idbuku" class="form-control-plaintext"
                                style="border-radius: 10px;" readonly>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="nim" class="col-form-label">Judul</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="judul" id="judul" class="form-control"
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Judul"
                                required>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="nama" class="col-form-label">Penulis</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="penulis" id="penulis" class="form-control"
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Penulis"
                                required>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="nama" class="col-form-label">Tahun Terbit</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="terbit" id="terbit" class="form-control"
                                style="background-color: #F4F9FF; border-radius: 10px;"
                                placeholder="Masukkan Tahun Terbit" required>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="nama" class="col-form-label">Jumlah</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="jumlah" id="jumlah" class="form-control"
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Jumlah"
                                required>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-3">
                            <label for="file" class="col-form-label">Image</label>
                        </div>
                        <div class="col-7">
                            <input type="file" name="image" id="image" class="form-control" accept="image/*"
                                style="background-color: #F4F9FF; border-radius: 10px;" placeholder="Masukkan Image">
                            <input type="hidden" name="oldimage" id="oldimage">
                        </div>
                    </div>
                    <div class="mt-1"></div>
                    <div class="row g-1 d-flex justify-content-center margin-row">
                        <div class="col-6 d-flex justify-content-center margin-row">
                            <img id="changesrc" src="" class="col-6 img-fluid img-thumbnail rounded">
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
    $('#Editbuku').on('show.bs.modal', function(e) {
        var idbuku = $(e.relatedTarget).data('id').idbuku;
        var judul = $(e.relatedTarget).data('id').judul;
        var penulis = $(e.relatedTarget).data('id').penulis;
        var tahun = $(e.relatedTarget).data('id').tahunterbit;
        var jumlah = $(e.relatedTarget).data('id').jumlahtersedia;
        var gambar = $(e.relatedTarget).data('id').gambar;
        $('#changesrc').attr('src', "{{ URL::to('/') }}/assets/" + gambar);
        $(e.currentTarget).find('input[id="idbuku"]').val(idbuku);
        $(e.currentTarget).find('input[id="judul"]').val(judul);
        $(e.currentTarget).find('input[id="penulis"]').val(penulis);
        $(e.currentTarget).find('input[id="terbit"]').val(tahun);
        $(e.currentTarget).find('input[id="jumlah"]').val(jumlah);
        $(e.currentTarget).find('input[id="oldimage"]').val(gambar);
    });
</script>
