<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Detail Kelas</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar-admin')

    <div class="container py-5">
        <h1 class="mb-5">Admin - Detail Kelas</h1>

        <!-- Form untuk menambahkan data -->
        <form action="/admin-detailkelas" method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="pengajar_id" class="form-label">Pengajar:</label>
                <select class="form-control" id="pengajar_id" name="pengajar_id">
                    @foreach($pengajars as $pengajar)
                    <option value="{{ $pengajar->id }}">{{ $pengajar->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kelas_id" class="form-label">Kelas:</label>
                <select class="form-control" id="kelas_id" name="kelas_id">
                    @foreach($kelases as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="waktu_kelas_id" class="form-label">Waktu Kelas:</label>
                <select class="form-control" id="waktu_kelas_id" name="waktu_kelas_id">
                    @foreach($waktu_kelases as $waktu_kelas)
                    <option value="{{ $waktu_kelas->id }}">{{ $waktu_kelas->hariKelas->hari }} - {{ $waktu_kelas->sesiKelas->nama }} {{ $waktu_kelas->sesiKelas->pukul }}</option>
                    @endforeach


                </select>
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas:</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <div class="container">
            <!-- Tabel untuk menampilkan seluruh isi detail kelas -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Pengajar</th>
                        <th>Kelas</th>
                        <th>Waktu Kelas</th>
                        <th>Kapasitas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detail_kelas as $kelas)
                    <tr>
                        <td>{{ $kelas->pengajar->nama }}</td>
                        <td>{{ $kelas->kelas->nama }}</td>
                        <td>{{ $kelas->waktuKelas->hariKelas->hari }} - {{ $kelas->waktuKelas->sesiKelas->nama }} {{ $kelas->waktuKelas->sesiKelas->pukul }}</td>
                        <td>{{ $kelas->kapasitas }}</td>
                        <td>
                            <!-- Tombol Edit dengan Modal -->
                            <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editModal{{ $kelas->id }}">Edit</button>

                            <!-- Tombol Delete -->
                            <form action="{{ route('admin-detailkelas.destroy', $kelas) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>


                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $kelas->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $kelas->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $kelas->id }}">Edit Detail Kelas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin-detailkelas/{{ $kelas->id }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="pengajar_id" class="form-label">Pengajar:</label>
                                                    <select class="form-control" id="pengajar_id" name="pengajar_id">
                                                        @foreach($pengajars as $pengajar)
                                                        <option value="{{ $pengajar->id }}" @if($pengajar->id == $kelas->pengajar_id) selected @endif>{{ $pengajar->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kelas_id" class="form-label">Kelas:</label>
                                                    <select class="form-control" id="kelas_id" name="kelas_id">
                                                        @foreach($kelases as $kelas)
                                                        <option value="{{ $kelas->id }}" @if($kelas->id == $kelas->kelas_id) selected @endif>{{ $kelas->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="waktu_kelas_id" class="form-label">Waktu Kelas:</label>
                                                    <select class="form-control" id="waktu_kelas_id" name="waktu_kelas_id">
                                                        @foreach($waktu_kelases as $waktu_kelas)
                                                        <option value="{{ $waktu_kelas->id }}" @if($waktu_kelas->id == $kelas->waktu_kelas_id) selected @endif>{{ $waktu_kelas->hariKelas->hari }} - {{ $waktu_kelas->sesiKelas->nama }} {{ $waktu_kelas->sesiKelas->pukul }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kapasitas" class="form-label">Kapasitas:</label>
                                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="{{ $kelas->kapasitas }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
