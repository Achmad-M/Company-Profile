<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Kelas</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar-admin')

    <div class="container py-5">
        <h1 class="mb-5">Admin - Kelas</h1>

        <!-- Form untuk menambahkan data -->
        <form action="/admin-kelas" method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <!-- Tabel untuk menampilkan seluruh isi kelas -->
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $kls)
                <tr>
                    <td>{{ $kls->nama }}</td>
                    <td>{{ $kls->harga }}</td>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
