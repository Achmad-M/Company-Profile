<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Pengguna Kelas</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-5">Admin - Pengguna Kelas</h1>

        <!-- Form untuk menambahkan data -->
        <form action="/admin-penggunakelas" method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="pengguna_id" class="form-label">Pengguna:</label>
                <select class="form-control" id="pengguna_id" name="pengguna_id">
                    @foreach($penggunas as $pengguna)
                    <option value="{{ $pengguna->id }}">{{ $pengguna->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="detail_kelas_id" class="form-label">Detail Kelas:</label>
                <select class="form-control" id="detail_kelas_id" name="detail_kelas_id">
                    @foreach($detail_kelas as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->sesiKelas->nama }} - {{ $kelas->sesiKelas->pukul }} - {{ $kelas->hariKelas->hari }}</option>


                    @endforeach


                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <!-- Tabel untuk menampilkan seluruh isi pengguna kelas -->
        <table class="table">
            <thead>
                <tr>
                    <th>Pengguna</th>
                    <th>Detail Kelas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengguna_kelas as $kelas)
                <tr>
                    <td>{{ $kelas->pengguna->nama_lengkap }}</td>
                    <td>{{ $kelas->detailKelas->nama }}</td>
                    <td>
                        <!-- Tombol Edit dengan Modal -->
                        <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editModal{{ $kelas->id }}">Edit</button>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $kelas->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $kelas->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $kelas->id }}">Edit Pengguna Kelas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin-penggunakelas/{{ $kelas->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="pengguna_id" class="form-label">Pengguna:</label>
                                                <select class="form-control" id="pengguna_id" name="pengguna_id">
                                                    @foreach($penggunas as $pengguna)
                                                    <option value="{{ $pengguna->id }}" {{ $pengguna->id == $kelas->pengguna_id ? 'selected' : '' }}>{{ $pengguna->nama_lengkap }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="detail_kelas_id" class="form-label">Detail Kelas:</label>
                                                <select class="form-control" id="detail_kelas_id" name="detail_kelas_id">
                                                    @foreach($detail_kelas as $kelas)
                                                    <option value="{{ $kelas->id }}" {{ $kelas->id == $kelas->detail_kelas_id ? 'selected' : '' }}>{{ $kelas->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Delete -->
                        <form action="/admin-penggunakelas/{{ $kelas->id }}" method="POST" class="d-inline">
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
