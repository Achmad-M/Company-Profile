<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Sesi Kelas</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar-admin')

    <div class="container py-5">
        <h1 class="mb-5">Dashboard - Sesi Kelas</h1>

        <!-- Form untuk menambahkan data -->
        <form action="/admin-sesikelas" method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pukul" class="form-label">Pukul:</label>
                <input type="text" id="pukul" name="pukul" class="form-control">
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>

        <!-- Tabel untuk menampilkan seluruh isi sesi kelas -->
        <table class="table">
            <thead>
                <tr>

                    <th>Action</th>
                    <th>Nama</th>
                    <th>Pukul</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($sesi_kelas as $kelas)
                <tr>

                    <td>
                        <!-- Edit button -->
                        <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editModal{{ $kelas->id }}">Edit</button>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $kelas->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $kelas->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $kelas->id }}">Edit Kelas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin-sesikelas/{{ $kelas->id }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama:</label>
                                                <input type="text" id="nama" name="nama" class="form-control" value="{{ $kelas->nama }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="pukul" class="form-label">Pukul:</label>
                                                <input type="text" id="pukul" name="pukul" class="form-control" value="{{ $kelas->pukul }}">
                                            </div>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete button -->
                        <form action="/admin-sesikelas/{{ $kelas->id }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                    <td>{{ $kelas->nama }}</td>
                    <td>{{ $kelas->pukul }}</td>

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
