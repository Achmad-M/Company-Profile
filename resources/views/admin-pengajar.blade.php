<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Pengajar</title>

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

</head>

<body>
    @include('navbar-admin')

    <div class="container py-5">
        <h1 class="mb-5">Dashboard - Pengajar</h1>
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalOne" style="margin-bottom: 10px;">
            Tambah Alamat Pengajar
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalOne" tabindex="-1" aria-labelledby="exampleModalLabelOne" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelOne">Tambah Alamat Pengajar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin-pengajar/storealamat" method="POST">


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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalTwo" style="margin-bottom: 10px;">
            Hapus Alamat Pengajar
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalTwo" tabindex="-1" aria-labelledby="exampleModalLabelTwo" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!-- Ubah ukuran modal menjadi modal-lg -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelTwo">Hapus Alamat Pengajar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow-y: auto;">
                        <!-- Tambahkan style untuk scroll -->
                        <!-- Tambahkan tabel di sini -->
                        <table class="table table-responsive">

                            <thead>
                                <tr>
                                    <th>Nama Jalan</th>
                                    <th>Nomor Rumah</th>
                                    <th>RT Rumah</th>
                                    <th>Nama Perumahan</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Kota</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alamatPengajars as $alamatPengajar)
                                <tr>
                                    <td>{{ $alamatPengajar->nama_jalan }}</td>
                                    <td>{{ $alamatPengajar->nomor_rumah }}</td>
                                    <td>{{ $alamatPengajar->rt_rumah }}</td>
                                    <td>{{ $alamatPengajar->nama_perumahan }}</td>
                                    <td>{{ $alamatPengajar->kecamatan }}</td>
                                    <td>{{ $alamatPengajar->kelurahan }}</td>
                                    <td>{{ $alamatPengajar->kota }}</td>
                                    <td>
                                        <!-- Tombol Delete -->
                                        <!-- Untuk menghapus alamat pengajar -->
                                        <form action="/admin-pengajar/{{ $alamatPengajar->id }}/destroy_alamat_pengajar" method="POST" class="d-inline">
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
                </div>
            </div>
        </div>

        <!-- Form untuk menambahkan data -->
        <form action="/admin-pengajar/store" method="POST" class="mb-3" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-select border-0" id="gender" name="jenis_kelamin" aria-label="jenis_kelamin">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tmpt_tgl_lahir" class="form-label">Tempat Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="tmpt_tgl_lahir" name="tmpt_tgl_lahir">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                    <div class="mb-3">
                        <label for="religion">Agama</label>
                        <select class="form-select border-0" id="religion" name="agama" aria-label="Agama">
                            <option selected disabled>Pilih agama</option>
                            <option value="Islam" {{ Cookie::get('agama') == 'Islam' ? 'selected' : '' }}>Islam
                            </option>
                            <option value="Kristen Protestan" {{ Cookie::get('agama') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan
                            </option>
                            <option value="Kristen Katolik" {{ Cookie::get('agama') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik
                            </option>
                            <option value="Hindu" {{ Cookie::get('agama') == 'Hindu' ? 'selected' : '' }}>Hindu
                            </option>
                            <option value="Buddha" {{ Cookie::get('agama') == 'Buddha' ? 'selected' : '' }}>Buddha
                            </option>
                            <option value="Khonghucu" {{ Cookie::get('agama') == 'Khonghucu' ? 'selected' : '' }}>
                                Khonghucu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto_diri" class="form-label">Foto diri (Ukuran file tidak melebihi 2 MB):</label>
                        <div class="form-floating">
                            <input type="file" class="form-control border-0" id="photo" name="foto_diri" accept="image/*" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP:</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_pengajar_id" class="form-label">Alamat Pengajar:</label>
                        <select class="form-control" id="alamat_pengajar_id" name="alamat_pengajar_id">
                            @foreach ($alamatPengajars as $alamatPengajar)
                            <option value="{{ $alamatPengajar->id }}">
                                {{ $alamatPengajar->nama_jalan }}, No. {{ $alamatPengajar->nomor_rumah }}, RT
                                {{ $alamatPengajar->rt_rumah }}, Kecamatan {{ $alamatPengajar->kecamatan }},
                                Kelurahan {{ $alamatPengajar->kelurahan }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Profile Pengajar</button>
        </form>



        <!-- Tabel untuk menampilkan seluruh isi sesi kelas -->
        <div style="overflow:auto; class=" overflow-x-auto"">

            <table class="table">
                <thead>
                    <tr>
                        <th>Action</th>

                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Foto Diri</th>
                        <th>Email</th>
                        <th>No HP</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        @foreach ($pengajars as $pengajar)
                    <tr>
                        <td>
                            <!-- Tombol Edit dengan Modal -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $pengajar->id }}">Edit</button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $pengajar->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $pengajar->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $pengajar->id }}">Edit
                                                Pengajar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" action="/admin-pengajar/{{ $pengajar->id }}" method="POST">

                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama:</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $pengajar->nama }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis_kelamin" class="form-label">Jenis
                                                        Kelamin:</label>
                                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $pengajar->jenis_kelamin }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tmpt_tgl_lahir" class="form-label">Tempat Tanggal
                                                        Lahir:</label>
                                                    <input type="text" class="form-control" id="tmpt_tgl_lahir" name="tmpt_tgl_lahir" value="{{ $pengajar->tmpt_tgl_lahir }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="agama" class="form-label">Agama:</label>
                                                    <input type="text" class="form-control" id="agama" name="agama" value="{{ $pengajar->agama }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="foto_diri" class="form-label">Foto Diri:</label>
                                                    @if ($pengajar->foto_diri)
                                                    <img src="{{ asset('photos_pengajar/' . $pengajar->foto_diri) }}" alt="Foto Diri" style="width: 100px; height: 100px;">
                                                    @endif
                                                    <input type="file" class="form-control" id="foto_diri" name="foto_diri">
                                                </div>


                                                <div class="mb-3">
                                                    <label for="alamat_pengajar_id" class="form-label">Alamat
                                                        Pengajar:</label>
                                                    <select class="form-control" id="alamat_pengajar_id" name="alamat_pengajar_id">
                                                        @foreach ($alamatPengajars as $alamatPengajar)
                                                        <option value="{{ $alamatPengajar->id }}" {{ $pengajar->alamat_pengajar_id == $alamatPengajar->id ? 'selected' : '' }}>
                                                            {{ $alamatPengajar->nama_jalan }}, No.
                                                            {{ $alamatPengajar->nomor_rumah }}, RT
                                                            {{ $alamatPengajar->rt_rumah }}, Kecamatan
                                                            {{ $alamatPengajar->kecamatan }}, Kelurahan
                                                            {{ $alamatPengajar->kelurahan }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>


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
                            <!-- Untuk menghapus pengajar -->
                            <form action="/admin-pengajar/{{ $pengajar->id }}/destroy_pengajar" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </td>

                        <td>{{ $pengajar->nama }}</td>
                        <td>{{ $pengajar->jenis_kelamin }}</td>
                        <td>{{ $pengajar->tmpt_tgl_lahir }}</td>
                        <td>
                            {{ $pengajar->alamat_pengajar->nama_jalan }},
                            {{ $pengajar->alamat_pengajar->nomor_rumah }},
                            {{ $pengajar->alamat_pengajar->rt_rumah }},
                            {{ $pengajar->alamat_pengajar->nama_perumahan }},
                            {{ $pengajar->alamat_pengajar->kecamatan }},
                            {{ $pengajar->alamat_pengajar->kelurahan }},
                            {{ $pengajar->alamat_pengajar->kota }}


                        </td>
                        <td>{{ $pengajar->agama }}</td>

                        <td>
                            <!-- Trigger the modal with a button -->
                            <img src="{{ asset('photos_pengajar/' . $pengajar->foto_diri) }}" width="100" data-toggle="modal" data-target="#fotoModal{{ $pengajar->id }}">

                            <!-- Modal -->
                            <div id="fotoModal{{ $pengajar->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('photos_pengajar/' . $pengajar->foto_diri) }}" width="50%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td>{{ $pengajar->email }}</td>
                        <td>{{ $pengajar->no_hp }}</td>

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
