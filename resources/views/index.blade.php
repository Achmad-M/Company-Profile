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


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">

                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('img/carousel-2.png') }}" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Buat Masa Depan yang Cerah Untuk Anak Anda</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Kami berdedikasi untuk membantu anak Anda mencapai potensi penuhnya melalui pendekatan belajar yang sabar, ramah, dan mendalam.</p>
                                    <a href="{{ route('about') }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Tentang Kami</a>

                                    <a href="{{ route('classes') }}" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Daftar Kelas</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('img/carousel-1.png') }}" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Bimbingan Belajar Terbaik Untuk Anak Anda</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Optimalkan potensi anak dengan bimbingan belajar kami. Dengan memahami dan mengenal anak Anda, kami berkomitmen untuk membantu mencapai tujuan akademiknya.</p>
                                    <a href="{{ route('about') }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Tentang Kami</a>

                                    <a href="{{ route('classes') }}" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Daftar Kelas</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Facilities Start -->
        @include('fasilitas')
        <!-- Facilities End -->


        <!-- About Start -->
        @include('tentang-kami')
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
                                <p class="mb-4">Dalam menjalankan kegiatan Belajar dan Mengajar kami membantu setiap anak menemukan keunikan dan mengembangkan kemampuan mereka melalui pendekatan belajar yang tepat, adapun profile kami sebagai berikut.
                                </p>
                                <a class="btn btn-primary py-3 px-5" href="{{ route('about') }}">Baca Selengkapnya<i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call To Action End -->

        <!-- Team Start -->
        @include('pengajar')



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
