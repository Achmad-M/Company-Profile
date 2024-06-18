<!-- Add Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="{{ route('index') }}" class="navbar-brand">
        <h1 class="m-0 text-primary"><img src="{{ asset('img/logo.png') }}" alt="logo edmedia" width="128" height="46.1757"></h1>
    </a>

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="{{ route('admin-pengguna-index') }}" class="nav-item nav-link {{ Request::is('admin-pengguna-index') ? 'active' : '' }}">Pengguna</a>
            <a href="{{ route('admin-detailkelas') }}" class="nav-item nav-link {{ Request::is('admin-detailkelas') ? 'active' : '' }}">Detail Kelas</a>
            <a href="{{ route('admin-kelas') }}" class="nav-item nav-link {{ Request::is('admin-kelas') ? 'active' : '' }}">Kelas</a>
            <a href="{{ route('admin-sesikelas') }}" class="nav-item nav-link {{ Request::is('admin-sesikelas') ? 'active' : '' }}">Sesi Kelas</a>
            <a href="{{ route('admin-harikelas') }}" class="nav-item nav-link {{ Request::is('admin-harikelas') ? 'active' : '' }}">Hari Kelas</a>
            <a href="{{ route('admin-pengajar') }}" class="nav-item nav-link {{ Request::is('admin-pengajar') ? 'active' : '' }}">Pengajar</a>
        </div>

        <a href="{{ route('admin-kelas-index') }}" class="btn btn-primary rounded-pill px-3 d-block d-lg-none mt-3">Informasi Kelas<i class="fa fa-arrow-right ms-3"></i></a>
        <a href="{{ route('admin-kelas-index') }}" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Informasi Kelas<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->

<!-- Add jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var isNavbarShown = false;

        $('.navbar-toggler').click(function() {
            if (isNavbarShown) {
                location.reload();
            } else {
                $('#navbarCollapse').css('display', 'block');
                isNavbarShown = true;
            }
        });
    });

</script>
