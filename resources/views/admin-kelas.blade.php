<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Kelas</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            /* Optional: Adds ellipsis (...) if text overflows */
        }

    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>

<body>
    @include('navbar-admin')

    <div class="container py-5">
        <h1 class="mb-5">Dashboard - Kelas</h1>

        <!-- Form untuk menambahkan data -->
        <form action="/admin-kelas" method="POST" class="mb-3" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            {{-- <label for="gambar_kelas" class="form-label">Gambar Kelas (Ukuran file tidak melebihi 2 MB):</label>

            <div class="mb-3">
                <div class="form-floating">
                    <input type="file" class="form-control border-0" id="photo" name="gambar_kelas" accept="image/*" />
                </div>

            </div> --}}

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="biaya_pendaftaran" class="form-label">Biaya Pendaftaran:</label>
                <input type="text" class="form-control" id="biaya_pendaftaran" name="biaya_pendaftaran">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <!-- Tabel untuk menampilkan seluruh isi kelas -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Nama</th>
                        {{-- <th>Gambar Kelas</th> --}}
                        <th>Harga</th>
                        <th>Biaya Pendaftaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelas as $kls)
                    <tr>
                        <td>
                            <!-- Tombol Edit dengan Modal -->
                            <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editModal{{ $kls->id }}">Edit</button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $kls->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $kls->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $kls->id }}">Edit Kelas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin-kelas/{{ $kls->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama:</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $kls->nama }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga:</label>
                                                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $kls->harga }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="biaya_pendaftaran" class="form-label">Biaya Pendaftaran:</label>
                                                    <input type="text" class="form-control" id="biaya_pendaftaran" name="biaya_pendaftaran" value="{{ $kls->biaya_pendaftaran }}">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Delete -->
                            <form action="/admin-kelas/{{ $kls->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                        <td>{{ $kls->nama }}</td>
                        <td>{{ $kls->harga }}</td>
                        <td>{{ $kls->biaya_pendaftaran }}</td>



                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
