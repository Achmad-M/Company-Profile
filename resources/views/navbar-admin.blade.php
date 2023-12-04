<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('index') }}">Navbar</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Tambahkan link baru di sini -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-pengguna-index') }}">Pengguna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-kelas-index') }}">Informasi Kelas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-detailkelas') }}">Detail Kelas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-kelas') }}">Kelas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-sesikelas') }}">Sesi Kelas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-harikelas') }}">Hari Kelas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-pengajar') }}">Pengajar</a>
            </li>

        </ul>
    </div>
</nav>
