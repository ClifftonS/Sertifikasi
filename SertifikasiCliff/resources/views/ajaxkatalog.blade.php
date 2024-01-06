<div class="album py-2 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($datasend as $datatable)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ URL::to('/') }}/assets/{{ $datatable->gambar }}"
                            class="bd-placeholder-img card-img-top object-fit-scale border rounded" width="100%"
                            height="225">
                        <div class="card-body">
                            <p class="card-text fw-bold d-flex justify-content-center">
                                {{ $datatable->judul }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="fw-normal">{{ $datatable->penulis }}</small>
                                <small class="fw-normal">{{ $datatable->tahun_terbit }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
