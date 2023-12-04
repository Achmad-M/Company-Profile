<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Waktu Kelas</title>
</head>
<body>
    @include('navbar-admin')

    <div class="container">
        <!-- Form Tambah Waktu Kelas -->
        <h2 class="mt-4">Tambah Waktu Kelas</h2>
        <form method="POST" action="/waktu-kelas">
            @csrf
            <div class="form-group">
                <label for="hari_kelas_id">Hari Kelas</label>
                <select class="form-control" name="hari_kelas_id" id="hari_kelas_id">
                    @foreach($hari_kelas as $hari)
                    <option value="{{ $hari->id }}">{{ $hari->hari }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sesi_kelas_id">Sesi Kelas</label>
                <select class="form-control" name="sesi_kelas_id" id="sesi_kelas_id">
                    @foreach($sesi_kelas as $sesi)
                    <option value="{{ $sesi->id }}">{{ $sesi->nama }} ({{ $sesi->pukul }})</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <!-- Tabel Waktu Kelas -->
        <h2 class="mt-4">Daftar Waktu Kelas</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Sesi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($waktu_kelas as $waktu)
                <tr>
                    <td>{{ $waktu->hariKelas->hari }}</td>
                    <td>{{ $waktu->sesiKelas->nama }} ({{ $waktu->sesiKelas->pukul }})</td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $waktu->id }}">Edit</button>
                        <form action="/waktu-kelas/{{ $waktu->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $waktu->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Waktu Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/waktu-kelas/{{ $waktu->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="hari_kelas_id">Hari Kelas</label>
                                        <select class="form-control" name="hari_kelas_id" id="hari_kelas_id">
                                            @foreach($hari_kelas as $hari)
                                            <option value="{{ $hari->id }}" {{ $hari->id == $waktu->hari_kelas_id ? 'selected' : '' }}>{{ $hari->hari }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sesi_kelas_id">Sesi Kelas</label>
                                        <select class="form-control" name="sesi_kelas_id" id="sesi_kelas_id">
                                            @foreach($sesi_kelas as $sesi)
                                            <option value="{{ $sesi->id }}" {{ $sesi->id == $waktu->sesi_kelas_id ? 'selected' : '' }}>{{ $sesi->nama }} ({{ $sesi->pukul }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Modal Edit -->

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
