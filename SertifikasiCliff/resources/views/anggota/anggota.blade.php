<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ URL::asset('css\style.css') }}">
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
                    <div class="ms-auto d-flex justify-content-end">
                        <a class="btn btn-primary mb-3" role="button" data-bs-toggle="modal"
                            data-bs-target="#Tambahanggota" data-bs-placement="top" style="display: flex">Tambah</a>
                    </div>
                    <table class="table table-hover table-bordered text-center table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="col-2" scope="col">Nama</th>
                                <th class="col-2" scope="col">No Telp</th>
                                <th class="col-2" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $datatable)
                                <tr>
                                    <td>{{ $datatable->nama }}</td>
                                    <td>{{ $datatable->no_telp }}</td>
                                    <td><a data-bs-toggle="modal" data-bs-target="#Editanggota"
                                            data-id='{"idagt":"{{ $datatable->id_agt }}","nama":"{{ $datatable->nama }}","notelp":"{{ $datatable->no_telp }}"}'
                                            class="edit text-decoration-none"><i
                                                class="icon fa-solid fa-pen-to-square"></i></a>
                                        |
                                        <a data-bs-toggle="modal" data-bs-target="#Deleteanggota"
                                            data-id='{"idagt":"{{ $datatable->id_agt }}"}'
                                            class="delete text-decoration-none"><i
                                                class="icon fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('anggota.addanggota')
        @include('anggota.editanggota')
        @include('anggota.deleteanggota')
    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="sidebars.js"></script>
</body>

</html>
