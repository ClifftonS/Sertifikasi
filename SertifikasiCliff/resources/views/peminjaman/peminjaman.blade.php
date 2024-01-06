<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>

    <link rel="stylesheet" href="{{ URL::asset('css\style.css') }}">
    {{-- SweetAlert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-fluid g-0">
        <div class="row g-0">
            @include('sidebar')
            <div class="col-10 g-0">
                <div class="col-10 my-3 offset-1">
                    <div class="row justify-content-start mb-3">
                        <div class="col-auto mt-1">Cari Peminjaman</div>
                        <div class="col-5 me-auto">
                            <input type="text" class="input form-control" id="input"
                                placeholder="Cari disini ....">
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-primary mb-3" role="button" data-bs-toggle="modal"
                                data-bs-target="#Tambahpmnj" data-bs-placement="top" style="display: flex">Tambah</a>
                        </div>
                    </div>
                    <div class="" style="height:320px">
                        <div class="search d-flex justify-content-center  mh-100 overflow-scroll" id="search"></div>
                    </div>
                    <p class="fw-bold mt-4">Peminjaman Lewat Tanggal</p>
                    <div class="" style="height:250px">
                        <div class="d-flex justify-content-center  mh-100 overflow-scroll">
                            @if (count($datalewat) != 0)
                                <table class="table table-hover table-bordered text-center table-striped align-middle">
                                    <thead class="table-dark align-middle">
                                        <tr>
                                            <th class="col-2" scope="col">Judul</th>
                                            <th class="col-2" scope="col">Nama Peminjam</th>
                                            <th class="col-2" scope="col">Tanggal Peminjaman</th>
                                            <th class="col-2" scope="col">Tanggal Harus Kembali</th>
                                            <th class="col-2" scope="col">Status</th>

                                        </tr>
                                    </thead>
                                    <tbody class="overflow-auto" style="max-height: 100px">
                                        @foreach ($datalewat as $datatable)
                                            <tr>
                                                <td>{{ $datatable->judul }}</td>
                                                <td>{{ $datatable->nama }}</td>
                                                <td>{{ date('d-m-Y', strtotime($datatable->tgl_pmnj)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($datatable->tgl_kembali)) }}</td>
                                                <td>{{ $datatable->status_pmnj == 0 ? 'Masih Dipinjam' : 'Telah Dikembalikan' }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    @else
                        <p>Tidak ada</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('peminjaman.addpeminjaman')
        {{-- @include('peminjaman.editpeminjaman') --}}
        @include('peminjaman.deletepeminjaman')
    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @if (Session::has('message'))
        <script>
            swal("Message", "{{ Session::get('message') }}", 'success', {
                button: true,
                butto: "OK"
            })
        </script>
    @endif
    <script src="sidebars.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            search();
            $("#input").keyup(function() {
                search();
            });
        });

        function search() {
            var strcari = $("#input").val();
            $.ajax({
                type: "get",
                url: "{{ url('/ajaxpmnj') }}",
                data: {
                    name: strcari
                },
                success: function(response) {
                    $("#search").html(response);
                }
            });
        }
    </script>
</body>

</html>
