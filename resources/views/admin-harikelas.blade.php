<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Hari Kelas</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar-admin')

    <div class="container py-5">
        <h1 class="mb-5">Dashboard - Hari Kelas</h1>

        <!-- Form untuk menambahkan data -->
        <form action="/admin-harikelas" method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="hari" class="form-label">Hari:</label>
                <input type="text" class="form-control" id="hari" name="hari">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <!-- Tabel untuk menampilkan seluruh isi sesi kelas -->
        <table class="table">
            <thead>
                <tr>

                    <th>Action</th>
                    <th>Hari</th>

                </tr>
            </thead>
            <tbody>
                @foreach($hari_kelas as $hari)
                <tr>
                    <td>
                        <!-- Tombol Edit dengan Modal -->
                        <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editModal{{ $hari->id }}">Edit</button>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $hari->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $hari->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $hari->id }}">Edit Hari</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin-harikelas/{{ $hari->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="hari" class="form-label">Hari:</label>
                                                <input type="text" class="form-control" id="hari" name="hari" value="{{ $hari->hari }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Delete -->
                        <form action="/admin-harikelas/{{ $hari->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                    <td>{{ $hari->hari }}</td>

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
