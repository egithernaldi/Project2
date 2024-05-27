<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Surat - Pelayanan Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        @foreach ($contacts as $contacts)
            <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
                <div class="col-lg-6 px-5 text-start">
                    <small><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $contacts->alamat }}</small>
                    <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>08.00 - 16.00</small>
                </div>
                <div class="col-lg-6 px-5 text-end">
                    <small><i class="fa fa-envelope text-primary me-2"></i>{{ $contacts->email }}</small>
                    <small class="ms-4"><i
                            class="fa fa-phone-alt text-primary me-2"></i>{{ $contacts->telepon }}</small>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                    <h1 class="display-5 text-primary m-0">{{ $contacts->nama }}</h1>
                </a>
                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <a href="#carausel" class="nav-item nav-link active">Beranda</a>
                        <a href="#about" class="nav-item nav-link">Tentang</a>
                        <a href="#layanan" class="nav-item nav-link">Layanan</a>
                        <a href="#kontak" class="nav-item nav-link">Kontak</a>
                        <a href="{{ 'login' }}" class="nav-item nav-link">Masuk</a>
                    </div>
                </div>
            </nav>
        @endforeach
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <section id="carausel" class="carausel">
        <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('frontend/img/carousel-1.jpg') }}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-lg-8">
                                        <p
                                            class="d-inline-block border border-white rounded text-primary fw-bold py-1 px-3 animated slideInDown">
                                            Selamat Datang</p>
                                        <h1 class="display-1 mb-4 animated slideInDown">Surat Anda adalah Tugas Kami
                                        </h1>
                                        <a href="{{ 'login' }}"
                                            class="btn btn-primary py-3 px-5 animated slideInDown">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset('frontend/img/carousel-2.jpg') }}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-lg-8">
                                        <p
                                            class="d-inline-block border border-white rounded text-primary fw-bold py-1 px-3 animated slideInDown">
                                            Selamat Datang</p>
                                        <h1 class="display-1 mb-4 animated slideInDown">Surat Anda adalah Tugas Kami
                                        </h1>
                                        <a href="{{ 'login' }}"
                                            class="btn btn-primary py-3 px-5 animated slideInDown">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->



        <!-- About Start -->
        <section id="about" class="about">
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-4 align-items-end mb-4">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid rounded" src="{{ url('storage/kontak/'.$contacts->gambar) }}">
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                            <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Tentang Kami
                            </p>
                            <h1 class="display-5 mb-4">Kami Membantu anda dalam Pembuatan Surat</h1>
                            <p class="mb-4">Anda Cukup Mengajukan Surat dan Menunggu Sambil Memeriksa Status Surat
                                Secara
                                Berkala
                            </p>
                            <div class="border rounded p-4">
                                <nav>
                                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                        @foreach ($tentangs as $index => $tentang)
                                            <button class="nav-link fw-semi-bold {{ $index === 0 ? 'active' : '' }}"
                                                id="nav-tab-{{ $index }}" data-bs-toggle="tab"
                                                data-bs-target="#nav-content-{{ $index }}" type="button"
                                                role="tab" aria-controls="nav-content-{{ $index }}"
                                                aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                {{ $tentang->judul }}
                                            </button>
                                        @endforeach
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach ($tentangs as $index => $tentang)
                                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                            id="nav-content-{{ $index }}" role="tabpanel"
                                            aria-labelledby="nav-tab-{{ $index }}">
                                            <p>{{ $tentang->Deskripsi }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="row g-4">
                            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="h-100">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                            <i class="fa fa-times text-white"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h4>Tidak dikenakan Biaya</h4>
                                            <span>Pengajuan Tidak dikenakan Biaya Apapun</span>
                                        </div>
                                        <div class="border-end d-none d-lg-block"></div>
                                    </div>
                                    <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="h-100">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                            <i class="fa fa-users text-white"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h4>Dedikasi Nagari</h4>
                                            <span>Surat Anda Segera diproses setelah Pengajuan</span>
                                        </div>
                                        <div class="border-end d-none d-lg-block"></div>
                                    </div>
                                    <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="h-100">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                            <i class="fa fa-phone text-white"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h4>Tersedia 24/7</h4>
                                            <span>Anda Bisa mengajukan Surat Kapanpun</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->


            <!-- Services Start -->
            <!-- Services Start -->
            <section id="layanan" name="layanan">
                <div class="container-fluid services py-5 mb-5">
                    <div class="container">
                        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s"
                            style="max-width: 600px;">
                            <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">
                                Layanan Kami</p>
                            <h1>Layanan untuk Pengajuan Surat Anda</h1>
                        </div>
                        <div class="row g-5 services-inner">
                            @foreach ($layanans as $layanan)
                                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                                    <div class="services-item bg-light">
                                        <div class="p-4 text-center services-content">
                                            <div class="services-content-icon">
                                                <i class="fa fa-code fa-7x mb-4 text-primary"></i>
                                                <h4 class="mb-3">{{ $layanan->judul }}</h4>
                                                <p class="mb-4">{{ $layanan->Deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services End -->

            <!-- Services End -->




            <!-- Callback Start -->
            <section id="kontak" class="kontak">
                <div class="container-fluid callback my-5 pt-5">
                    <div class="container pt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s"
                                        style="max-width: 600px;">
                                        <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">
                                            Get In Touch</p>
                                        <h1 class="display-5 mb-5">Informasi Kontak</h1>
                                    </div>
                                    <div class="contact-info">

                                        <ul>
                                            <li><strong>Telepon:</strong> {{ $contacts->telepon }}</li>
                                            <li><strong>Email:</strong> {{ $contacts->email }}</li>
                                            <li><strong>Alamat:</strong> {{ $contacts->alamat }}</li>
                                        </ul>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a href="https://wa.me/6285214980760" target="_blank"
                                            class="btn btn-primary btn-lg">Hubungi Kami</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Callback End -->

                <!-- Copyright Start -->
                <div class="container-fluid copyright py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right
                                Reserved.
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                                Distributed By <a href="https://themewagon.com">ThemeWagon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Copyright End -->


                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
                        class="bi bi-arrow-up"></i></a>


                <!-- JavaScript Libraries -->
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
                <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
                <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
                <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
                <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>

                <!-- Template Javascript -->
                <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
