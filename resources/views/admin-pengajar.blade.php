<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Pengajar</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar-admin')

    <div class="container py-5">
        <h1 class="mb-5">Admin - Pengajar</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Address
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin-pengajar" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_jalan" class="form-label">Nama Jalan:</label>
                                <input type="text" class="form-control" id="nama_jalan" name="nama_jalan">
                            </div>
                            <div class="mb-3">
                                <label for="nomor_rumah" class="form-label">Nomor Rumah:</label>
                                <input type="text" class="form-control" id="nomor_rumah" name="nomor_rumah">
                            </div>
                            <div class="mb-3">
                                <label for="rt_rumah" class="form-label">RT Rumah:</label>
                                <input type="text" class="form-control" id="rt_rumah" name="rt_rumah">
                            </div>
                            <div class="mb-3">
                                <label for="nama_perumahan" class="form-label">Nama Perumahan:</label>
                                <input type="text" class="form-control" id="nama_perumahan" name="nama_perumahan">
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan:</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                            </div>
                            <div class="mb-3">
                                <label for="kelurahan" class="form-label">Kelurahan:</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                            </div>
                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota:</label>
                                <input type="text" class="form-control" id="kota" name="kota">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Form untuk menambahkan data -->
        <form action="/admin-pengajar" method="POST" class="mb-3">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    </div>
                    <div class="mb-3">
                        <label for="tmpt_tgl_lahir" class="form-label">Tempat Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="tmpt_tgl_lahir" name="tmpt_tgl_lahir">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama:</label>
                        <input type="text" class="form-control" id="agama" name="agama">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="foto_diri" class="form-label">Foto Diri:</label>
                        <input type="file" class="form-control" id="foto_diri" name="foto_diri">
                    </div> --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP:</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_pengajar_id" class="form-label">Alamat Pengajar:</label>
                        <select class="form-control" id="alamat_pengajar_id" name="alamat_pengajar_id">
                            @foreach($alamatPengajars as $alamatPengajar)
                            <option value="{{ $alamatPengajar->id }}">
                                {{ $alamatPengajar->nama_jalan }}, No. {{ $alamatPengajar->nomor_rumah }}, RT {{ $alamatPengajar->rt_rumah }}, Kecamatan {{ $alamatPengajar->kecamatan }}, Kelurahan {{ $alamatPengajar->kelurahan }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>



        <!-- Tabel untuk menampilkan seluruh isi sesi kelas -->
        <div style="overflow:auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Agama</th>
                        {{-- <th>Foto Diri</th> --}}
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengajars as $pengajar)
                    <tr>
                        <td>{{ $pengajar->nama }}</td>
                        <td>{{ $pengajar->jenis_kelamin }}</td>
                        <td>{{ $pengajar->tmpt_tgl_lahir }}</td>
                        <td>{{ $pengajar->agama }}</td>
                        {{-- <td><img src="{{ $pengajar->foto_diri }}" alt="Foto Diri"></td> --}}
                        <td>{{ $pengajar->email }}</td>
                        <td>{{ $pengajar->no_hp }}</td>

                        <td>
                            <!-- Tombol Edit dengan Modal -->
                            <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editModal{{ $pengajar->id }}">Edit</button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $pengajar->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $pengajar->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $pengajar->id }}">Edit Pengajar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin-pengajar/{{ $pengajar->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama:</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $pengajar->nama }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $pengajar->jenis_kelamin }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tmpt_tgl_lahir" class="form-label">Tempat Tanggal Lahir:</label>
                                                    <input type="text" class="form-control" id="tmpt_tgl_lahir" name="tmpt_tgl_lahir" value="{{ $pengajar->tmpt_tgl_lahir }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="agama" class="form-label">Agama:</label>
                                                    <input type="text" class="form-control" id="agama" name="agama" value="{{ $pengajar->agama }}">
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="foto_diri" class="form-label">Foto Diri:</label>
                                                    <input type="file" class="form-control" id="foto_diri" name="foto_diri" value="{{ $pengajar->foto_diri }}">
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $pengajar->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_hp" class="form-label">No HP:</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $pengajar->no_hp }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
        </div>



        <!-- Tombol Delete -->
        <form action="/admin-pengajar/{{ $pengajar->id }}" method="POST" class="d-inline">
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
