<!DOCTYPE html>
<html>
<head>
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="text-center">Data Pengguna</h3>
                        <br />
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Action</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Foto Diri</th>
                                    <th>Tingkat Sekolah</th>
                                    <th>Nomor HP</th>
                                    <th>Waktu Kelas</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                                @foreach($penggunas as $pengguna)
                                @foreach($pengguna->penggunaKelas as $penggunaKelas)
                                <tr>
                                    <!-- Edit Button -->
                                    <td>
                                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#editModal{{ $pengguna->id }}">Edit</button>
                                        <form action="/delete/{{ $pengguna->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>

                                    <td>{{ $pengguna->nama_lengkap }}</td>
                                    <td>{{ $pengguna->jenis_kelamin }}</td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <img src="{{ asset('photos/' . $pengguna->foto_diri) }}" width="100" data-toggle="modal" data-target="#fotoModal{{ $pengguna->id }}">
                                        <!-- Modal -->
                                        <div id="fotoModal{{ $pengguna->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('photos/' . $pengguna->foto_diri) }}" width="50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $pengguna->tingkat_sekolah }}</td>
                                    <td>{{ $pengguna->no_hp }}</td>
                                    <td>{{ $penggunaKelas->detailKelas->name }} {{ $penggunaKelas->detailKelas->waktuKelas->hariKelas->hari }} {{ $penggunaKelas->detailKelas->waktuKelas->sesiKelas->nama }} {{ $penggunaKelas->detailKelas->waktuKelas->sesiKelas->pukul }} </td>
                                    <td>
                                        <!-- Trigger the modal with a button -->
                                        <img src="{{ asset('payment_proofs/' . $pengguna->bukti_pembayaran) }}" width="100" data-toggle="modal" data-target="#buktiModal{{ $pengguna->id }}">
                                        <!-- Modal -->
                                        <div id="buktiModal{{ $pengguna->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('payment_proofs/' . $pengguna->bukti_pembayaran) }}" width="100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $pengguna->status_pembayaran }}</td>
                                    <!-- Edit Modal -->
                                    <div id="editModal{{ $pengguna->id }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                    <h4 class="modal-title">Edit Data Pengguna</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/update/{{ $pengguna->id }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label>Nama Lengkap:</label>
                                                            <input type="text" class="form-control" name="nama_lengkap" value="{{ $pengguna->nama_lengkap }}">
                                                            <label>Jenis Kelamin:</label>
                                                            <input type="text" class="form-control" name="jenis_kelamin" value="{{ $pengguna->jenis_kelamin }}">
                                                            <label>Tingkat Sekolah :</label>
                                                            <input type="text" class="form-control" name="tingkat_sekolah" value="{{ $pengguna->tingkat_sekolah }}">
                                                            <label>Nomor HP :</label>
                                                            <input type="text" class="form-control" name="no_hp" value="{{ $pengguna->no_hp }}">
                                                            <label>Status Pembayaran :</label>
                                                            <select class="form-control" name="status_pembayaran">
                                                                <option value="Pending" {{ $pengguna->status_pembayaran == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                                <option value="Lunas" {{ $pengguna->status_pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                                            </select>


                                                        </div>
                                                        <!-- Add more form fields as needed -->
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include jQuery first, then Bootstrap JS at the end of your document -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
