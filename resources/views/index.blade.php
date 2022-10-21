<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Jalur Mandiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Jalur Mandiri, Wujudkan Mimpimu Masuk Kampus Idaman" />
    <meta name="keywords" content="jalur mandiri, mandiri, sbmptn, utbk" />
    <meta content="Jalur Mandiri" name="author" />
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://jalurmandiri.com">
    <meta property="og:title" content="Jalur Mandiri">
    <meta property="og:description" content="Jalur Mandiri, Wujudkan Mimpimu Masuk Kampus Idaman">
    <meta property="og:image" content="{{ asset('assets-guest/images/favicon.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://jalurmandiri.com">
    <meta property="twitter:title" content="Jalur Mandiri">
    <meta property="twitter:description" content="Jalur Mandiri, Wujudkan Mimpimu Masuk Kampus Idaman">
    <meta property="twitter:image" content="{{ asset('assets-guest/images/favicon.png') }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets-guest/images/favicon.ico') }}" />
    <!-- css -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-guest/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- magnific pop-up -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-guest/css/magnific-popup.css') }}" />
    <!-- magnific pop-up -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-guest/css/ion.rangeSlider.min.css') }}" />
    <!-- Pe-icon-7 icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-guest/css/pe-icon-7-stroke.css') }}" />
    <!-- Swiper CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets-guest/css/swiper.min.css') }}" />
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky" style="z-index: 1000;">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="/">
                <img src="{{ asset('assets-guest/images/logo-dark.png') }}" alt="" height="22" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                    <li class="nav-item active">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="nav-link">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a href="#team" class="nav-link">Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="#testimonial" class="nav-link">Testomoni</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Kontak</a>
                    </li>
                </ul>
                @guest
                @if (Route::has('login'))
                <div class="navbar-button d-none d-lg-inline-block">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary btn-round">Login</a>
                </div>
                @endif
                @if (Route::has('register'))
                @endif
                @else
                <div class="navbar-button d-none d-lg-inline-block">
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-primary btn-round" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                @endguest
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- START HOME -->
    <section class="bg-home align-items-center" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="home-contact mt-4">
                        <p class="text-primary font-weight-bold">Belajar Dimanapun & Kapanpun</p>

                        <h1 class="home-title mt-3">Wujudkan Mimpimu Masuk Kampus Idaman</h1>

                        <p class="text-muted mt-4">
                            Belajar dengan mudah dibimbing mentor berpengalaman dan ribuan latihan soal masuk kampus.
                        </p>

                        <div class="mt-4 pt-3">
                            @guest
                            @if (Route::has('login'))
                            <a href="{{ route('register') }}" class="btn btn-primary mr-3">Daftar</a>
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                            @endif
                            @if (Route::has('register'))
                            @endif
                            @else
                            <a href="{{ route('user.dashboard') }}" class="btn btn-primary mr-3">Dashboard</a>
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endguest
                        </div>

                        <div class="watch-video pt-5">
                            <a href="http://vimeo.com/99025203" class="video-play-icon text-white"><i class="mdi mdi-play play-icon-circle play play-iconbar"></i> <span class="text-dark">Lihat Daftar Tryout Gratis!</span></a>
                        </div>
                    </div>
                </div>

                @guest
                @if (Route::has('login'))
                @endif
                @if (Route::has('register'))
                <div class="col-lg-5 offset-lg-1">
                    <div class="home-registration-form bg-white p-5 mt-4">
                        <h5 class="form-title mb-4 text-center font-weight-bold">Daftar Gratis</h5>
                        <form class="registration-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="text-muted">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" class="form-control mb-4 registration-input-box" name="nama_lengkap" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-muted">No. HP</label>
                                    <input type="text" id="no_hp" class="form-control mb-4 registration-input-box" name="no_hp" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="text-muted">Email</label>
                                    <input type="email" id="email" class="form-control mb-4 registration-input-box @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-muted">Password</label>
                                    <input type="password" id="password" class="form-control mb-4 registration-input-box" name="password" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="text-muted">Universitas Tujuan</label>
                                    <select class="form-control mb-4 registration-input-box" id="id_universitas" name="id_universitas" required>
                                        <!-- <option value="" selected disabled>Pilih</option> -->
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-muted">Kode Referral</label>
                                    <input type="referrer" id="referrer" class="form-control mb-4 registration-input-box" name="referrer" value="{{app('request')->input('referrer')}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Daftar Gratis</button>
                        </form>
                    </div>
                </div>
                @endif
                @endguest
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <!-- START FEATURES -->
    <section class="section pb-5" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Kenapa Memilih Kami?</p>
                        <h2 class="title-heading">Benefit Belajar Pintar Dengan Jalur Mandiri</h2>
                        <p class="title-desc text-muted mt-2">Dengan Dukungan Pembimbing Profesional & 10.000+ Contoh Soal Ujian Masuk Kampus.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-4">
                @foreach($fitur_1s as $fitur_1)
                <div class="col-lg-4">
                    <div class="features-box mt-4">
                        <h1 class="features-title">01</h1>
                        <div class="features-img">
                            <img src="{{ asset('assets-guest/images/icon/rulers.png') }}" class="img-fluid" alt="" />
                        </div>

                        <h5 class="f-18 mt-4">{{ $fitur_1->header }}</h5>
                        <p class="text-muted mt-3">{{ $fitur_1->deskripsi }}</p>
                        <div class="mt-3">
                            <a href="{{ route('register') }}" class="text-primary font-weight-600"> Daftar Sekarang<i class="mdi mdi-arrow-right ml-2"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach($fitur_2s as $fitur_2)
                <div class="col-lg-4">
                    <div class="features-box mt-4">
                        <h1 class="features-title">02</h1>
                        <div class="features-img">
                            <img src="{{ asset('assets-guest/images/icon/compose.png') }}" class="img-fluid" alt="" />
                        </div>
                        
                        <h5 class="f-18 mt-4">{{ $fitur_2->header }}</h5>
                        <p class="text-muted mt-3">{{ $fitur_2->deskripsi }}</p>
                        <div class="mt-3">
                            <a href="{{ route('register') }}" class="text-primary font-weight-600"> Daftar Sekarang<i class="mdi mdi-arrow-right ml-2"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach($fitur_3s as $fitur_3)
                <div class="col-lg-4">
                    <div class="features-box mt-4">
                        <h1 class="features-title">03</h1>
                        <div class="features-img">
                            <img src="{{ asset('assets-guest/images/icon/presentation.png') }}" class="img-fluid" alt="" />
                        </div>

                        <h5 class="f-18 mt-4">{{ $fitur_3->header }}</h5>
                        <p class="text-muted mt-3">{{ $fitur_3->deskripsi }}</p>
                        <div class="mt-3">
                            <a href="{{ route('register') }}" class="text-primary font-weight-600"> Daftar Sekarang<i class="mdi mdi-arrow-right ml-2"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END SERVICES -->

    <!-- START WORK -->
    
    <!-- END WORK -->

    <!-- START COUNTER -->
    
    <!-- END COUNTER -->

    <!-- START PRICING -->
    <section class="section pb-5" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Daftar Paket</p>
                        <h2 class="title-heading">Paket Unggulan Jalur Mandiri</h2>
                        <p class="title-desc text-muted mt-2">Paket ramah kantong dengan fitur unggulan, khusus kamu yang mau masuk kampus impian. Dibimbing mentor asyik berpengalaman!.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">

                    <div class="tab-content pt-1" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">
                            <div class="row">
                                @foreach($pakets as $paket)
                                <div class="col-lg-4 mb-3">
                                    <div class="pricing-box shadow rounded h-100">
                                        @if($paket->nama_paket == 'Premium')
                                        <div class="pricing-badge">
                                            <span class="badge">Featured</span>
                                        </div>
                                        @endif
                                        <h5>{{ $paket->nama_paket }}</h5>

                                        <div class="mt-4 text-center pb-2">
                                            @if($paket->diskon == 0)
                                            <h3 class="text-primary mt-4">{{ "Rp. ".number_format($paket->harga, 0) }}</h3>
                                            @else
                                            <s>{{ "Rp. ".number_format($paket->harga, 0) }}</s>
                                            <h3 class="text-primary mt-4">{{ "Rp. ".number_format($paket->jumlah, 0) }}</h3>
                                            @endif
                                            <h5 class="f-16 mb-2">Per Semester</h5>
                                        </div>

                                        <hr>
                                        <div class="mt-4 pt-2">
                                            @php
                                            $keterangan_akses = explode(', ', $paket->keterangan_akses);
                                            $keterangan_no_akses = explode(', ', $paket->keterangan_no_akses);
                                            @endphp
                                            @if(count($keterangan_akses) > 1)
                                            @foreach($keterangan_akses as $akses)
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>{{ $akses }}</p>
                                            @endforeach
                                            @endif
                                            @if(count($keterangan_no_akses) > 1)
                                            @foreach($keterangan_no_akses as $no_akses)
                                            <p class="mb-2"><i class="mdi mdi-close-box-outline text-danger f-18 mr-2"></i>{{ $no_akses }}</p>
                                            @endforeach
                                            @endif
                                        </div>

                                        <div class="mt-4 pt-3 text-center">
                                            @if($paket->nama_paket == 'Gratis')
                                            <button class="btn btn-outline-primary">Gratis</button>
                                            @else
                                            <button id="paket-btn" data-id="{{ $paket->id_paket }}" class="btn btn-outline-primary">Pesan Sekarang</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <div class="pricing-box shadow mt-4 rounded">
                                        <div class="pricing-badge">
                                            <span class="badge">Featured</span>
                                        </div>
                                        <h5>Startup</h5>

                                        <div class="mt-4 text-center pb-2">
                                            <h3 class="text-primary mt-4">$299<span class="f-14 text-muted">/Month</span></h3>
                                            <h5 class="f-16 mb-2">5,000 Monthly Active Users</h5>
                                        </div>

                                        <div class="mt-4 bg-light p-3">
                                            <input type="text" id="pricerange2" />
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Verifide work and reviews</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Dedicated accounts managers</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Unlimited proposals</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Project tracking</p>
                                            <p class="mb-2"><i class="mdi mdi-close-box-outline text-danger f-18 mr-2"></i>Easy payments</p>
                                        </div>

                                        <div class="mt-4 pt-3 text-center">
                                            <a href="" class="btn btn-primary">Start with Floaks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PRICING -->

    <!-- START TEAM -->
    <section class="section" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Tim Kami</p>
                        <h2 class="title-heading">Jalur Mandiri Didukung Dengan Tenaga Profesional</h2>
                        <p class="title-desc text-muted mt-2">Sempurnakan pemahamanmu dibantu mentor yang berpengalaman dan asyik seperti sahabatmu sendiri. Belajar jadi santai tapi tetap paham maksimal!.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                @foreach($tims as $tim)
                <div class="col-lg-3">
                    <div class="team-box rounded shadow mt-4 bg-white rounded">
                        <div class="p-4">
                            <div class="team-img text-center">
                                <img src="{{ $tim->foto }}" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <div class="text-center mt-4">
                                <h5 class="f-18">{{ $tim->nama }}</h5>
                                <p class="text-muted mb-0 f-14 mt-2">{{ $tim->email }}</p>
                            </div>
                        </div>

                        <div class="team-border text-center">
                            <p class="text-muted text-uppercase f-13 mb-0">{{ $tim->jabatan }}</p>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END TEAM -->

    <!-- START CTA -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <h2>You are just <span class="text-primary">2 setps </span> away form us to know more about our work & aim</h2>

                        <div class="search-form mt-5">
                            <form action="#">
                                <input type="text" placeholder="Enter Your email address" />
                                <button type="submit" class="btn btn-primary">Send Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CTA -->

    <!-- START TESTIMONIAL -->
    <section class="section bg-testimonial" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary mb-3">Testimoni</p>
                        <h2 class="title-heading">Kata Mereka yang Puas Belajar Pakai Jalur Mandiri</h2>
                        <p class="title-desc text-muted mt-2">Pengguna Jalur Mandiri berpeluang besar tembus kampus impian mereka.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5 justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <div class="carousel-inner pb-5">
                            @for($i = 0; $i < count($testimonis); $i++)
                            @if($i == 0)
                            <div class="carousel-item active">
                            @else
                            <div class="carousel-item">
                            @endif
                                <div class="client-box bg-light mt-4">
                                    <div class="media">
                                        <div class="client-img">
                                            <img src="{{ $testimonis[$i]['foto'] }}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="media-body ml-3 mt-2">
                                            <h5 class="f-18">{{ $testimonis[$i]['nama'] }}</h5>
                                            <p class="text-primary mb-0">- User</p>
                                        </div>
                                        <div class="client-icon">
                                            <i class="mdi mdi-format-quote-close text-primary"></i>
                                        </div>
                                    </div>

                                    <p class="client-desc mt-4 mb-0 pt-1 f-18">
                                        {{ $testimonis[$i]['testimoni'] }}
                                    </p>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <img src="{{ asset('assets-guest/images/testimonial.png') }}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL -->

    <!-- START CONTACT -->
    <section class="section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Contact Us</p>
                        <h2 class="title-heading">Ingin menggunakan Jalur Mandiri atau ada pertanyaan? Yuk, hubungi kami!</h2>
                        <p class="title-desc text-muted mt-2">Hubungi tim Jalur Mandiri, kami siap membantu sepenuh hati!</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-lg-6">
                    <div class="mt-4">
                        <img src="{{ asset('assets-guest/images/img-1.png') }}" class="img-fluid" alt="" />
                    </div>

                    <div class="row mt-3">
                        @foreach($kontaks as $kontak)
                        <div class="col-lg-6">
                            <div class="mt-4">
                                <h5 class="f-18">Email</h5>
                                <p class="mb-2 mt-3 text-muted"><i class="mdi mdi-email mr-2 text-primary"></i>{{ $kontak->email }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mt-4">
                                <h5 class="f-18">No. HP/WhatsApp</h5>
                                <p class="mb-2 mt-3 text-muted"><i class="mdi mdi-phone mr-2 text-primary"></i>{{ $kontak->no_hp }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <h5 class="f-18">Alamat</h5>
                            <p class="mb-2 mt-3 text-muted"><i class="mdi mdi-map-marker mr-2 text-primary"></i>Malang</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mt-4">
                        <div class="custom-form mt-4">
                            <div id="message"></div>
                            <form method="post" action="php/contact.php" name="contact-form" id="contact-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mt-1">
                                            <label class="contact-lable">First Name</label>
                                            <input name="name" id="name" class="form-control" type="text" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mt-1">
                                            <label class="contact-lable">Last Name</label>
                                            <input name="name" id="lastname" class="form-control" type="text" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-1">
                                            <label class="contact-lable">Email Address</label>
                                            <input name="email" id="emailad" class="form-control" type="text" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-1">
                                            <label class="contact-lable">Subject</label>
                                            <input name="subject" id="subject" class="form-control" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-1">
                                            <label class="contact-lable">Your Message</label>
                                            <textarea name="comments" id="comments" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mt-3 text-right">
                                        <input id="submit" name="send" class="submitBnt btn btn-primary btn-round" value="Send Message" type="submit" />
                                        <div id="simple-msg"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTACT -->

    <!-- START FOOTER -->
    <section class="section bg-light pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-info mt-4">
                        <img src="{{ asset('assets-guest/images/logo-dark.png') }}" alt="" height="22" />
                        <h5 class="f-18 mt-4 pt-1 line-height_1_6">
                            Jalur Mandiri, Wujudkan Mimpimu Masuk Kampus Idaman
                        </h5>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="row">
                        <!-- <div class="col-lg-4">
                            <div class="mt-4">
                                <h5 class="f-18">Features</h5>
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="">6 Home </a></li>
                                    <li><a href="">Technology</a></li>
                                    <li><a href="">News & Events</a></li>
                                    <li><a href="">Company</a></li>
                                </ul>
                            </div>
                        </div> -->

                        <div class="col-lg-6">
                            <div class="mt-4">
                                <h5 class="f-18">Kebijakan</h5>
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="/kebijakan">Kebijakan Pengguna</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mt-4">
                                <h5 class="f-18">Perusahaan</h5>
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="https://goo.gl/maps/xMfDzL4E9dKjPyHCA" target="_blank">Malang</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mt-4 pl-0 pl-lg-4">
                        <h5 class="f-18">Follow Us</h5>
                        <ul class="list-inline social-icons-list pt-3">
                            <li class="list-inline-item">
                                <a href="#"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="mdi mdi-linkedin"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="mdi mdi-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr class="my-5" />

            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="text-muted mb-0">Copyright ©<span id="year"></span> <a href="https://www.jalurmandiri.com" target="_blank">Jalur Mandiri</a>. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END FOOTER -->

    <!-- javascript -->
    <script src="{{ asset('assets-guest/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/scrollspy.min.js') }}"></script>

    <!-- Portfolio -->
    <script src="{{ asset('assets-guest/js/ion.rangeSlider.min.js') }}"></script>

    <!-- Portfolio -->
    <script src="{{ asset('assets-guest/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/isotope.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('assets-guest/js/swiper.min.js') }}"></script>

    <!--flex slider plugin-->
    <script src="{{ asset('assets-guest/js/jquery.flexslider-min.js') }}"></script>

    <!-- yt player -->
    <script src="{{ asset('assets-guest/js/jquery.mb.YTPlayer.js') }}"></script>

    <!-- contact init -->
    <script src="{{ asset('assets-guest/js/contact.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

          $("#id_universitas").select2({
            // theme: "bootstrap4",
            ajax: { 
                url: "{{route('getuniv')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term 
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
      });
  </script>

  <!-- Main Js -->
  <script src="{{ asset('assets-guest/js/app.js') }}"></script>
  <script type="text/javascript">
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>
</body>
</html>
