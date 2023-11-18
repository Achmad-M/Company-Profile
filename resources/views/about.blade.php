<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kider - Preschool Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        @include('navbar')
        <!-- Navbar End -->


        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Tentang Kami</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Beranda</a></li>
                        <!-- <li class="breadcrumb-item"><a href="{{ route('index') }}">Halaman</a></li> -->
                        <li class="breadcrumb-item text-white active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">Tentang Bimbel di LKP EDMEDIA </h1>
                        <p> Berdiri sejak 10 Oktober 2010, LKP EDMEDIA telah menjadi pilar dalam memberikan pendidikan berkualitas bagi semua lapisan masyarakat. Kami berkomitmen untuk menciptakan kesempatan belajar yang sama bagi semua, terutama bagi mereka yang berada di kalangan menengah ke bawah. Dengan biaya yang terjangkau dan bahkan gratis dalam beberapa kasus (dengan syarat dan ketentuan berlaku), kami berusaha untuk memastikan bahwa setiap anak memiliki akses ke pendidikan berkualitas.</p>
                        <p class="mb-4">

                        Pendekatan kami dalam proses belajar adalah dengan kesabaran dan keramahan, yang disesuaikan untuk memenuhi kebutuhan spesifik setiap siswa. Kami berusaha untuk menciptakan lingkungan belajar yang mendukung dan mendorong pertumbuhan. Dengan pendekatan belajar yang sabar, kami memberikan waktu yang cukup bagi setiap siswa untuk memahami konsep dan ide. Dengan keramahan, kami memastikan bahwa setiap siswa merasa nyaman dan aman selama proses belajar. Kami percaya bahwa pendidikan adalah hak semua orang, dan kami berdedikasi untuk membuat hak tersebut menjadi kenyataan.</p>
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle flex-shrink-0" src="{{ asset('img/user.png') }}" alt="" style="width: 45px; height: 45px;">
                                    <div class="ms-3">
                                        <h6 class="text-primary mb-1">Ima Rahmawati</h6>
                                        <small>Founder</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75 rounded-circle bg-light p-3" src="{{ asset('img/about-4.png') }}" alt="">
                            </div>
                            <div class="col-6 text-start" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{ asset('img/about-2.png') }}" alt="">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{ asset('img/about-3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Call To Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="{{ asset('img/image4people.png') }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Profile Kami</h1>
                                <p class="mb-4">Dalam  menjalankan kegiatan Belajar dan Mengajar kami membantu setiap anak menemukan keunikan dan mengembangkan kemampuan mereka melalui pendekatan belajar yang tepat, adapun profile kami sebagai berikut.</p>
                                <p class="mb-4">LKP EDMEDIA, yang berlokasi di Jalan Pemuda Batakan Gg. Aster No. 62 RT. 006 Kelurahan Manggar, Kecamatan Balikpapan Timur, Kota Balikpapan, Provinsi Kalimantan Timur, adalah lembaga kursus dan bimbingan belajar yang memenuhi kebutuhan masyarakat sekitar. Dengan harga terjangkau, fasilitas memadai, dan kualitas pendidikan yang baik, LKP EDMEDIA menjadi solusi bagi masyarakat yang mencari tempat bimbingan belajar berkualitas untuk anak-anak mereka.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call To Action End -->


        <!-- Team Start -->
        @include('pengajar')
        <!-- Team End -->


        <!-- Footer Start -->
        @include('footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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