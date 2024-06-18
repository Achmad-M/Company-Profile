<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="{{ route('index') }}" class="navbar-brand">
        <h1 class="m-0 text-primary"><img src="{{ asset('img/logo.png') }}" alt="logo edmedia" width="128" height="46.1757"></h1>
    </a>

    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="{{ route('index') }}" class="nav-item nav-link {{ Request::is('index') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('classes') }}" class="nav-item nav-link {{ Request::is('classes') ? 'active' : '' }}">Kelas</a>
            <div class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                    <a href="{{ route('facility') }}" class="dropdown-item">Fasilitas Bimbel</a>
                    <a href="{{ route('team') }}" class="dropdown-item">Pengajar Populer</a>
                    <!-- <a href="{{ route('call-to-action') }}" class="dropdown-item">Become A Teachers</a> -->
                    <!-- <a href="{{ route('appointment') }}" class="dropdown-item">Make Appointment</a> -->
                    <!-- <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                    <a href="{{ route('error') }}" class="dropdown-item">404 Error</a> -->
                </div>
            </div>
            <a href="https://wa.me/6285651319976" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}" target="_blank">Hubungi Kami</a>
        </div>
        <a href="{{ route('classes') }}" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Daftar Kelas<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->
