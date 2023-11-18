<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kider - Preschool Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Masih Error GET http://127.0.0.1:8000/img/favicon.ico 404 (Not Found) -->
    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Google Sign-In
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="191755170156-ce7scrma0u2fbbd129dak3n4ipg30jn8.apps.googleusercontent.com"> -->

    <style>
        /* Add custom styles here */
        .school-facilities {
            background-color: #ffffff;
            /* Set the background color for School Facilities section to white */
            /* padding: 60px 0; Add some padding for better spacing */
        }

    </style>

</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
        <a href="{{ route('index') }}" class="navbar-brand">
            <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i><img src="{{ asset('img/logo.png') }}" alt="logo edmedia" width="128" height="46.1757"></h1>
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto">
                <a href="{{ route('index') }}" class="nav-item nav-link {{ Request::is('index') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About Us</a>
                <a href="{{ route('classes') }}" class="nav-item nav-link {{ Request::is('classes') ? 'active' : '' }}">Classes</a>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                        <a href="{{ route('facility') }}" class="dropdown-item">School Facilities</a>
                        <a href="{{ route('team') }}" class="dropdown-item">Popular Teachers</a>
                        <a href="{{ route('call-to-action') }}" class="dropdown-item">Become A Teachers</a>
                        <a href="{{ route('appointment') }}" class="dropdown-item">Make Appointment</a>
                        <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                        <a href="{{ route('error') }}" class="dropdown-item">404 Error</a>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact Us</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="school-facilities">
        <div class="container py-4">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Formulir Pendaftaran</h1>
                    <p>Mohon lengkapi formulir di bawah ini untuk mendaftarkan anak Anda. Pastikan semua informasi yang diberikan akurat dan lengkap.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </div>

    <!-- Data Diri Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s">
                        <h2 class="mb-4">Data Diri</h2>
                        <form id="registrationForm" action="{{ route('pengguna.store', ['id' => request()->id]) }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="fullname" name="nama_lengkap" value="{{ Cookie::get('nama_lengkap') }}" placeholder="Nama Lengkap">
                                        <label for="fullname">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="nickname" name="nama_panggilan" value="{{ Cookie::get('nama_panggilan') }}" placeholder="Nama Panggilan">
                                        <label for="nickname">Nama Panggilan</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <select class="form-select border-0" id="gender" name="jenis_kelamin" aria-label="jenis_kelamin">
                                            <option selected disabled>Jenis Kelamin</option>
                                            <option value="laki-laki" {{ Cookie::get('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
                                            <option value="perempuan" {{ Cookie::get('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>perempuan</option>
                                        </select>
                                        <label for="gender">Jenis Kelamin</label>
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="birthplace" name="birthplace" value="{{ Cookie::get('birthplace') }}" placeholder="Tempat Lahir">
                                        <label for="birthplace">Tempat Lahir</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control border-0" id="birthdate" name="birthdate" value="{{ Cookie::get('birthdate') }}" placeholder="Tanggal Lahir">
                                        <label for="birthdate">Tanggal Lahir</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <select class="form-select border-0" id="religion" name="agama" aria-label="Agama">
                                            <option selected disabled>Agama</option>
                                            <option value="Islam" {{ Cookie::get('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Kristen Protestan" {{ Cookie::get('agama') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                            <option value="Kristen Katolik" {{ Cookie::get('agama') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                            <option value="Hindu" {{ Cookie::get('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="Buddha" {{ Cookie::get('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="Khonghucu" {{ Cookie::get('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                        </select>
                                        <label for="religion">Agama</label>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control border-0" id="phone" name="no_hp" value="{{ Cookie::get('no_hp') }}" placeholder="Nomor Telepon">
                                        <label for="phone">Nomor Telepon (WhatsApp)</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="email" name="email" value="{{ Cookie::get('email') }}" placeholder="Email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-floating">
                                        <select class="form-select border-0" name="tingkat_sekolah" id="schoolLevel" aria-label="Asal Sekolah">
                                            <option selected disabled>Pilih Tingkat Sekolah</option>
                                            <option value="Pra-TK" {{ Cookie::get('tingkat_sekolah') == 'Pra-TK' ? 'selected' : '' }}>Belum Pernah Sekolah</option>
                                            <option value="Pra-TK" {{ Cookie::get('tingkat_sekolah') == 'Pra-TK' ? 'selected' : '' }}>Pra-TK</option>
                                            <option value="Pra-SD" {{ Cookie::get('tingkat_sekolah') == 'Pra-SD' ? 'selected' : '' }}>Pra-SD</option>
                                            <option value="SD-1" {{ Cookie::get('tingkat_sekolah') == 'SD-1' ? 'selected' : '' }}>SD Kelas 1</option>
                                            <option value="SD-2" {{ Cookie::get('tingkat_sekolah') == 'SD-2' ? 'selected' : '' }}>SD Kelas 2</option>
                                            <option value="SD-3" {{ Cookie::get('tingkat_sekolah') == 'SD-3' ? 'selected' : '' }}>SD Kelas 3</option>
                                            <option value="SD-4" {{ Cookie::get('tingkat_sekolah') == 'SD-4' ? 'selected' : '' }}>SD Kelas 4</option>
                                            <option value="SD-5" {{ Cookie::get('tingkat_sekolah') == 'SD-5' ? 'selected' : '' }}>SD Kelas 5</option>
                                            <option value="SD-6" {{ Cookie::get('tingkat_sekolah') == 'SD-6' ? 'selected' : '' }}>SD Kelas 6</option>
                                            <option value="SMP-1" {{ Cookie::get('tingkat_sekolah') == 'SMP-1' ? 'selected' : '' }}>SMP Kelas 1</option>
                                            <option value="SMP-2" {{ Cookie::get('tingkat_sekolah') == 'SMP-2' ? 'selected' : '' }}>SMP Kelas 2</option>
                                        </select>
                                        <label for="schoolLevel">Tingkat Sekolah</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="school" name="asal_sekolah" value="{{ Cookie::get('asal_sekolah') }}" placeholder="Asal Sekolah">
                                        <label for="school">Asal Sekolah (Jika Belum Pernah Sekolah Isi "Belum Sekolah" )</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="fathername" name="nama_ayah" value="{{ Cookie::get('nama_ayah') }}" placeholder="Nama Ayah">
                                        <label for="fathername">Nama Ayah</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="mothername" name="nama_ibu" value="{{ Cookie::get('nama_ibu') }}" placeholder="Nama Ibu">
                                        <label for="mothername">Nama Ibu</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="file" class="form-control border-0" id="photo" name="foto_diri" accept="image/*" />
                                        <label for="photo">Unggah Foto anak (Maksimal 2 MB)</label>
                                    </div>
                                    <small id="photoHelpBlock" class="form-text text-muted">
                                        Pastikan ukuran file tidak melebihi 2 MB.
                                    </small>
                                </div>
                                {{-- Alamat Rumah --}}
                                <h2 class="mb-4">Alamat Rumah</h2>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="street" name="nama_jalan" value="{{ Cookie::get('nama_jalan') }}" placeholder="Nama Jalan">
                                        <label for="street">Nama Jalan</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="houseNumber" name="nomor_rumah" value="{{ Cookie::get('nomor_rumah') }}" placeholder="Nomor Rumah">
                                        <label for="houseNumber">Nomor Rumah</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="rt" name="rt_rumah" value="{{ Cookie::get('rt_rumah') }}" placeholder="RT Rumah">
                                        <label for="rt">RT Rumah</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="housing" name="nama_perumahan" value="{{ Cookie::get('nama_perumahan') }}" placeholder="Nama Perumahan (Opsional)">
                                        <label for="housing">Nama Perumahan (Opsional)</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="subdistrict" name="kecamatan" value="{{ Cookie::get('kecamatan') }}" placeholder="Kecamatan">
                                        <label for="subdistrict">Kecamatan</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="village" name="kelurahan" value="{{ Cookie::get('kelurahan') }}" placeholder="Kelurahan">
                                        <label for="village">Kelurahan</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="city" name="kota" value="{{ Cookie::get('kota') }}" placeholder="Kota">
                                        <label for="city">Kota</label>
                                    </div>
                                </div>

                                <h2>Bukti Pembayaran</h2>
                                <p>Silahkan melakukan transfer pada</p>
                                <h5>LKP EDMEDIA di Bank BNI, No.Rek : 1234567890 sebesar Rp.170.000,- (seratus tujuh puluh rupiah) </h5>
                                <h6 class="mb-3"> Rp.150.000 Biaya Bimbel Bulanan + Rp.20.000 Biaya Pendaftaran</h6>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="file" class="form-control border-0" id="paymentProof" name="bukti_pembayaran" accept="image/*" />
                                        <label for="paymentProof">Unggah Bukti Pembayaran (Maksimal 2 MB)</label>
                                    </div>
                                    <small id="paymentProofHelpBlock" class="form-text text-muted">
                                        Pastikan ukuran file tidak melebihi 2 MB.
                                    </small>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Diri End -->

    @include('footer')
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
