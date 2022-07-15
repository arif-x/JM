<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Jalur Mandiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Jalur Mandiri, Wujudkan Mimpimu Masuk Kampus Idaman" />
    <meta name="keywords" content="jalur mandiri, mandiri, sbmptn, utbk" />
    <meta content="Jalur Mandiri" name="author" />

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
                        <a href="/#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#features" class="nav-link">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#pricing" class="nav-link">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#team" class="nav-link">Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#testimonial" class="nav-link">Testomoni</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#contact" class="nav-link">Kontak</a>
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

    <!-- START TESTIMONIAL -->
    <section class="section bg-testimonial" id="kebijakan" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary mb-3">Kebijakan Privasi</p>
                        <h2 class="title-heading">Kebijakan Privasi</h2>
                    </div>
                    {!!$kebijakans[0]->kebijakan!!}
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
                        <h2 class="title-heading">Let's talk about everything!</h2>
                        <p class="title-desc text-muted mt-2">Donec dapibus dolor at semper dictum phasellus fringilla sem risus mollis faucibus dolor eleifend id maecenas viverra.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-lg-6">
                    <div class="mt-4">
                        <img src="{{ asset('assets-guest/images/img-1.png') }}" class="img-fluid" alt="" />
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="mt-4">
                                <h5 class="f-18">Online Services</h5>
                                <p class="mb-2 mt-3 text-muted"><i class="mdi mdi-email mr-2 text-primary"></i>JohnPBeau@jourrapide.com</p>
                                <p class="text-muted"><i class="mdi mdi-email mr-2 text-primary"></i>mycheapsale.com</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mt-4">
                                <h5 class="f-18">Online Contact</h5>
                                <p class="mb-2 mt-3 text-muted"><i class="mdi mdi-phone mr-2 text-primary"></i> +112 708-231-9668</p>
                                <p class="text-muted"><i class="mdi mdi-phone mr-2 text-primary"></i>+125 458-565-9695</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <h5 class="f-18">Office Address</h5>
                            <p class="mb-2 mt-3 text-muted"><i class="mdi mdi-map-marker mr-2 text-primary"></i>3429 Gnatty Creek Road Farmingdale, NY 11735</p>
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
                                            <input name="email" id="email" class="form-control" type="text" />
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
                                    <li><a href="">Kebijakan Pengguna</a></li>
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

    <!-- Main Js -->
    <script src="{{ asset('assets-guest/js/app.js') }}"></script>
    <script type="text/javascript">
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
</body>
</html>
