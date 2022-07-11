<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Floaks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
    <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />
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
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="index.html">
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
                        <a href="#portfolio" class="nav-link">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="nav-link">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a href="#team" class="nav-link">Team</a>
                    </li>
                    <li class="nav-item">
                        <a href="#testimonial" class="nav-link">Testimonial</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>
                <div class="navbar-button d-none d-lg-inline-block">
                    <a href="" class="btn btn-sm btn-primary btn-round">Sign Up</a>
                </div>
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
                        <p class="text-primary font-weight-bold">Time date and problem monitoring</p>

                        <h1 class="home-title mt-3">Super Fast Professional Invoicing For Freelancers</h1>

                        <p class="text-muted mt-4">
                            Quisque a diam mattis fermentum lectus tempuada <br />
                            velit cras magna dictum porta dolor dapibus dolor Etiam congartue hendrerit fusce eget ligula.
                        </p>

                        <div class="mt-4 pt-3">
                            <a href="" class="btn btn-primary mr-3">Estimate project</a>
                            <a href="" class="btn btn-outline-primary">Our portfolio</a>
                        </div>

                        <div class="watch-video pt-5">
                            <a href="http://vimeo.com/99025203" class="video-play-icon text-white"><i class="mdi mdi-play play-icon-circle play play-iconbar"></i> <span class="text-dark">Watch our company video!</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1">
                    <div class="home-registration-form bg-white p-5 mt-4">
                        <h5 class="form-title mb-4 text-center font-weight-bold">Get 30 day FREE Trial</h5>
                        <form class="registration-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <label class="text-muted">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" class="form-control mb-4 registration-input-box" name="nama_lengkap" required>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="text-muted">No. HP</label>
                                    <input type="text" id="no_hp" class="form-control mb-4 registration-input-box" name="no_hp" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-muted">Email</label>
                                    <input type="email" id="email" class="form-control mb-4 registration-input-box @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="text-muted">Password</label>
                                    <input type="password" id="password" class="form-control mb-4 registration-input-box" name="password" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-muted">Universitas Tujuan</label>
                                    <select class="form-control mb-4 registration-input-box" name="id_universitas" required>
                                        <option value="" selected disabled>Pilih</option>
                                            @foreach($universitas as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Free Trial</button>
                        </form>
                    </div>
                </div>
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
                        <p class="title-sub-heading text-primary f-18">Our Features</p>
                        <h2 class="title-heading">Get work done in over 300+ different categories</h2>
                        <p class="title-desc text-muted mt-2">Donec dapibus dolor at semper dictum phasellus fringilla sem risus mollis faucibus dolor eleifend id maecenas viverra.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-4">
                <div class="col-lg-4">
                    <div class="features-box mt-4">
                        <h1 class="features-title">01</h1>
                        <div class="features-img">
                            <img src="{{ asset('assets-guest/images/icon/rulers.png') }}" class="img-fluid" alt="" />
                        </div>

                        <h5 class="f-18 mt-4">Digital Product</h5>
                        <p class="text-muted mt-3">Pellentesque viverra augarue molestie convallis sit amet interdum bibendum sem urna condimentum.</p>
                        <div class="mt-3">
                            <a href="" class="text-primary font-weight-600"> Learn more <i class="mdi mdi-arrow-right ml-2"></i> </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="features-box mt-4">
                        <h1 class="features-title">02</h1>
                        <div class="features-img">
                            <img src="{{ asset('assets-guest/images/icon/compose.png') }}" class="img-fluid" alt="" />
                        </div>

                        <h5 class="f-18 mt-4">Digital Marketing</h5>
                        <p class="text-muted mt-3">Passage you need sure there anything embarssing hidden the open chunks necesary making Internet.</p>
                        <div class="mt-3">
                            <a href="" class="text-primary font-weight-600"> Learn more <i class="mdi mdi-arrow-right ml-2"></i> </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="features-box mt-4">
                        <h1 class="features-title">03</h1>
                        <div class="features-img">
                            <img src="{{ asset('assets-guest/images/icon/presentation.png') }}" class="img-fluid" alt="" />
                        </div>

                        <h5 class="f-18 mt-4">Business Consult</h5>
                        <p class="text-muted mt-3">Passage you need sure there anything embrassing text hidden all necessary making generator Internet.</p>
                        <div class="mt-3">
                            <a href="" class="text-primary font-weight-600"> Learn more <i class="mdi mdi-arrow-right ml-2"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICES -->

    <!-- START WORK -->
    <section class="section" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Our Portfolio</p>
                        <h2 class="title-heading">We work fast, but we do not do it alone.</h2>
                        <p class="title-desc text-muted mt-2">Donec dapibus dolor at semper dictum phasellus fringilla sem risus mollis faucibus dolor eleifend id maecenas viverra.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-2">
                <div class="col-lg-12">
                    <div class="text-center">
                        <ul class="col container-filter portfolioFilte list-unstyled mb-0" id="filter">
                            <li><a class="categories active" data-filter="*">All</a></li>
                            <li><a class="categories" data-filter=".Brand">Brand</a></li>
                            <li><a class="categories" data-filter=".Design">Design</a></li>
                            <li><a class="categories" data-filter=".Graphic">Graphic</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- End portfolio  -->
            <div class="port portfolio-masonry mt-5">
                <div class="portfolioContainer row">
                    <div class="col-lg-4 col-md-4 Brand p-3">
                        <div class="item-box p-2 rounded">
                            <a class="cbox-gallary1 mfp-image" href="{{ asset('assets-guest/images/portfolio/img-1.png') }}" title="Consumer Insights">
                                <img class="item-container rounded" src="{{ asset('assets-guest/images/portfolio/img-1.png') }}" alt="work-img" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 Design p-3">
                        <div class="item-box p-2 rounded">
                            <a class="cbox-gallary1 mfp-image" href="{{ asset('assets-guest/images/portfolio/img-2.png') }}" title="Financial Service">
                                <img class="item-container rounded" src="{{ asset('assets-guest/images/portfolio/img-2.png') }}" alt="work-img" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 Design p-3">
                        <div class="item-box p-2 rounded">
                            <a class="cbox-gallary1 mfp-image" href="{{ asset('assets-guest/images/portfolio/img-3.png') }}" title="Latest Technology">
                                <img class="item-container rounded" src="{{ asset('assets-guest/images/portfolio/img-3.png') }}" alt="work-img" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 Graphic p-3">
                        <div class="item-box p-2 rounded">
                            <a class="cbox-gallary1 mfp-image" href="{{ asset('assets-guest/images/portfolio/img-4.png') }}" title="Business Growth">
                                <img class="item-container rounded" src="{{ asset('assets-guest/images/portfolio/img-4.png') }}" alt="work-img" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 Brand p-3">
                        <div class="item-box p-2 rounded">
                            <a class="cbox-gallary1 mfp-image" href="{{ asset('assets-guest/images/portfolio/img-5.png') }}" title="International Business">
                                <img class="item-container rounded" src="{{ asset('assets-guest/images/portfolio/img-5.png') }}" alt="work-img" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 Design Brand p-3">
                        <div class="item-box p-2 rounded">
                            <a class="cbox-gallary1 mfp-image" href="{{ asset('assets-guest/images/portfolio/img-6.png') }}" title="Consumer Products">
                                <img class="item-container rounded" src="{{ asset('assets-guest/images/portfolio/img-6.png') }}" alt="work-img" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END WORK -->

    <!-- START COUNTER -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Specialized Skill</p>
                        <h2 class="title-heading">Why do people love us</h2>
                        <p class="title-desc text-muted mt-2">Donec dapibus dolor at semper dictum phasellus fringilla sem risus mollis faucibus dolor eleifend id maecenas viverra.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-4 pt-3" id="counter">
                <div class="col-lg-4">
                    <div class="counter-box mt-4 p-4">
                        <h2 class="counter-count text-primary"><span class="counter-value" data-count="49">25</span> <span class="count-plus"> M</span></h2>
                        <h5 class="mt-2 f-18">Creative User</h5>
                        <p class="text-muted mt-3 mb-0">Aliquam erat volutpat elit quisque porta varius malesauada nuarnc turpis imperdiet id odio.</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="counter-box mt-4 p-4">
                        <h2 class="counter-count text-primary"><span class="counter-value" data-count="97">36</span> <span class="count-plus"> %</span></h2>
                        <h5 class="mt-2 f-18">Successful rate</h5>
                        <p class="text-muted mt-3 mb-0">Vivamus id lorem ut dolor sagittis elementum finibus vel felis maecenas laoreet leo sollicitudin.</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="p-4">
                        <div class="mt-4">
                            <p class="font-weight-500 mb-2">Html</p>
                            <div class="progress" style="height: 9px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="font-weight-500 mb-2">Css</p>
                            <div class="progress" style="height: 9px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 87%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100">87%</div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="font-weight-500 mb-2">Bootstrap</p>
                            <div class="progress" style="height: 9px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END COUNTER -->

    <!-- START PRICING -->
    <section class="section pb-5" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Our Pricing</p>
                        <h2 class="title-heading">Choose the offering that works best for you</h2>
                        <p class="title-desc text-muted mt-2">Donec dapibus dolor at semper dictum phasellus fringilla sem risus mollis faucibus dolor eleifend id maecenas viverra.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <ul class="nav nav-pills rounded justify-content-center d-inline-block pricing-tab-border py-1 px-2" id="pills-tab" role="tablist">
                            <li class="nav-item d-inline-block">
                                <a class="nav-link px-3 rounded active monthly" id="Monthly" data-toggle="pill" href="#Month" role="tab" aria-controls="Month" aria-selected="true">Monthly</a>
                            </li>
                            <li class="nav-item d-inline-block">
                                <a class="nav-link px-3 rounded yearly" id="Yearly" data-toggle="pill" href="#Year" role="tab" aria-controls="Year" aria-selected="false">
                                    Yearly <span class="badge bg-success rounded text-white">20% Off </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content pt-3" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <div class="pricing-box shadow mt-4 rounded">
                                        <h5>Freelancer</h5>

                                        <div class="mt-4 text-center pb-2">
                                            <h3 class="text-primary mt-4">$199<span class="f-14 text-muted">/Month</span></h3>
                                            <h5 class="f-16 mb-2">1,000 Monthly Active Users</h5>
                                        </div>

                                        <div class="mt-4 bg-light p-3">
                                            <input type="text" id="pricerange1" />
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Verifide work and reviews</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Dedicated accounts managers</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Unlimited proposals</p>
                                            <p class="mb-2"><i class="mdi mdi-close-box-outline text-danger f-18 mr-2"></i>Project tracking</p>
                                            <p class="mb-2"><i class="mdi mdi-close-box-outline text-danger f-18 mr-2"></i>Easy payments</p>
                                        </div>

                                        <div class="mt-4 pt-3 text-center">
                                            <a href="" class="btn btn-outline-primary">Start with Floaks</a>
                                        </div>
                                    </div>
                                </div>

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

                                <div class="col-lg-4">
                                    <div class="pricing-box shadow mt-4 rounded">
                                        <h5>Enterprice</h5>

                                        <div class="mt-4 text-center pb-2">
                                            <h3 class="text-primary mt-4">$399<span class="f-14 text-muted">/Month</span></h3>
                                            <h5 class="f-16 mb-2">10,000 Monthly Active Users</h5>
                                        </div>

                                        <div class="mt-4 bg-light p-3">
                                            <input type="text" id="pricerange3" />
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Verifide work and reviews</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Dedicated accounts managers</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Unlimited proposals</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Project tracking</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Easy payments</p>
                                        </div>

                                        <div class="mt-4 pt-3 text-center">
                                            <a href="" class="btn btn-outline-primary">Start with Floaks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Year" role="tabpanel" aria-labelledby="Yearly">
                            <div class="row mt-3">
                                <div class="col-lg-4">
                                    <div class="pricing-box shadow mt-4 rounded">
                                        <h5>Freelancer</h5>

                                        <div class="mt-4 text-center pb-2">
                                            <h3 class="text-primary mt-4">$599<span class="f-14 text-muted">/Month</span></h3>
                                            <h5 class="f-16 mb-2">1,000 Monthly Active Users</h5>
                                        </div>

                                        <div class="mt-4 bg-light p-3">
                                            <input type="text" id="pricerange4" />
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Verifide work and reviews</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Dedicated accounts managers</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Unlimited proposals</p>
                                            <p class="mb-2"><i class="mdi mdi-close-box-outline text-danger f-18 mr-2"></i>Project tracking</p>
                                            <p class="mb-2"><i class="mdi mdi-close-box-outline text-danger f-18 mr-2"></i>Easy payments</p>
                                        </div>

                                        <div class="mt-4 pt-3 text-center">
                                            <a href="" class="btn btn-outline-primary">Start with Floaks</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="pricing-box shadow mt-4 rounded">
                                        <div class="pricing-badge">
                                            <span class="badge">Featured</span>
                                        </div>
                                        <h5>Startup</h5>

                                        <div class="mt-4 text-center pb-2">
                                            <h3 class="text-primary mt-4">$799<span class="f-14 text-muted">/Month</span></h3>
                                            <h5 class="f-16 mb-2">5,000 Monthly Active Users</h5>
                                        </div>

                                        <div class="mt-4 bg-light p-3">
                                            <input type="text" id="pricerange5" />
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

                                <div class="col-lg-4">
                                    <div class="pricing-box shadow mt-4 rounded">
                                        <h5>Enterprice</h5>

                                        <div class="mt-4 text-center pb-2">
                                            <h3 class="text-primary mt-4">$999<span class="f-14 text-muted">/Month</span></h3>
                                            <h5 class="f-16 mb-2">10,000 Monthly Active Users</h5>
                                        </div>

                                        <div class="mt-4 bg-light p-3">
                                            <input type="text" id="pricerange6" />
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Verifide work and reviews</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Dedicated accounts managers</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Unlimited proposals</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Project tracking</p>
                                            <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>Easy payments</p>
                                        </div>

                                        <div class="mt-4 pt-3 text-center">
                                            <a href="" class="btn btn-outline-primary">Start with Floaks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <p class="title-sub-heading text-primary f-18">Our Team</p>
                        <h2 class="title-heading">Meet our expert people of payonline</h2>
                        <p class="title-desc text-muted mt-2">Donec dapibus dolor at semper dictum phasellus fringilla sem risus mollis faucibus dolor eleifend id maecenas viverra.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-lg-3">
                    <div class="team-box rounded shadow mt-4 bg-white rounded">
                        <div class="p-4">
                            <div class="team-img text-center">
                                <img src="{{ asset('assets-guest/images/user/img-1.jpg') }}" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <div class="text-center mt-4">
                                <h5 class="f-18">Zachary Tevis</h5>
                                <p class="text-muted mb-0 f-14 mt-2">Zacharyt@gmail.com</p>
                            </div>
                        </div>

                        <div class="team-border text-center">
                            <p class="text-muted text-uppercase f-13 mb-0">Web Designer</p>
                        </div>

                        <div class="team-social text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="team-box rounded shadow mt-4 bg-white rounded">
                        <div class="p-4">
                            <div class="team-img text-center">
                                <img src="{{ asset('assets-guest/images/user/img-2.jpg') }}" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <div class="text-center mt-4">
                                <h5 class="f-18">Jeremiah Eskew</h5>
                                <p class="text-muted mb-0 f-14 mt-2">JeremiahE@gmail.com</p>
                            </div>
                        </div>

                        <div class="team-border text-center">
                            <p class="text-muted text-uppercase f-13 mb-0">Manager</p>
                        </div>

                        <div class="team-social text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-box rounded shadow mt-4 bg-white rounded">
                        <div class="p-4">
                            <div class="team-img text-center">
                                <img src="{{ asset('assets-guest/images/user/img-3.jpg') }}" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <div class="text-center mt-4">
                                <h5 class="f-18">Zachary Tevis</h5>
                                <p class="text-muted mb-0 f-14 mt-2">ZacharyT@gmail.com</p>
                            </div>
                        </div>

                        <div class="team-border text-center">
                            <p class="text-muted text-uppercase f-13 mb-0">Web Developer</p>
                        </div>

                        <div class="team-social text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="team-box rounded shadow mt-4 bg-white rounded">
                        <div class="p-4">
                            <div class="team-img text-center">
                                <img src="{{ asset('assets-guest/images/user/img-4.jpg') }}" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <div class="text-center mt-4">
                                <h5 class="f-18">William Aldman</h5>
                                <p class="text-muted mb-0 f-14 mt-2">WilliamA@gmail.com</p>
                            </div>
                        </div>

                        <div class="team-border text-center">
                            <p class="text-muted text-uppercase f-13 mb-0">Ceo</p>
                        </div>

                        <div class="team-social text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="text-reset"><i class="mdi mdi-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                        <p class="title-sub-heading text-primary mb-3">Our Feedback</p>
                        <h2 class="title-heading">Few Words Form Our Satisfied Clients</h2>
                        <p class="title-desc text-muted mt-2">Donec dapibus dolor at semper dictum phasellus fringilla sem risus mollis faucibus dolor eleifend id maecenas viverra.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5 justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner pb-5">
                            <div class="carousel-item active">
                                <div class="client-box bg-light mt-4">
                                    <div class="media">
                                        <div class="client-img">
                                            <img src="{{ asset('assets-guest/images/user/img-1.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="media-body ml-3 mt-2">
                                            <h5 class="f-18">Derek Monroe</h5>
                                            <p class="text-primary mb-0">- Designer</p>
                                        </div>
                                        <div class="client-icon">
                                            <i class="mdi mdi-format-quote-close text-primary"></i>
                                        </div>
                                    </div>

                                    <p class="client-desc mt-4 mb-0 pt-1 f-18">
                                        Vestibulum mollis auctor aliquam dolor sit amet consectetur adipiscing elit Aenean volutpat vitae metus quis diam dolor lobortis eros conetur ligula odio a magna interdum Maecenas sit amet
                                        malesuada dolor vitae commodo magna dapibus sit amet.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="client-box bg-light mt-4">
                                    <div class="media">
                                        <div class="client-img">
                                            <img src="{{ asset('assets-guest/images/user/img-2.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="media-body ml-3 mt-2">
                                            <h5 class="f-18">Brandon Carney</h5>
                                            <p class="text-primary mb-0">- Designer</p>
                                        </div>
                                        <div class="client-icon">
                                            <i class="mdi mdi-format-quote-close text-primary"></i>
                                        </div>
                                    </div>
                                    <p class="client-desc mt-4 mb-0 pt-1 f-18">
                                        Vestibulum mollis auctor aliquam dolor sit amet consectetur adipiscing elit Aenean volutpat vitae metus quis diam dolor lobortis eros conetur ligula odio a magna interdum Maecenas sit amet
                                        malesuada dolor vitae commodo magna dapibus sit amet.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="client-box bg-light mt-4">
                                    <div class="media">
                                        <div class="client-img">
                                            <img src="{{ asset('assets-guest/images/user/img-3.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="media-body ml-3 mt-2">
                                            <h5 class="f-18">Brandon Carney</h5>
                                            <p class="text-primary mb-0">- Designer</p>
                                        </div>
                                        <div class="client-icon">
                                            <i class="mdi mdi-format-quote-close text-primary"></i>
                                        </div>
                                    </div>
                                    <p class="client-desc mt-4 mb-0 pt-1 f-18">
                                        Vestibulum mollis auctor aliquam dolor sit amet consectetur adipiscing elit Aenean volutpat vitae metus quis diam dolor lobortis eros conetur ligula odio a magna interdum Maecenas sit amet
                                        malesuada dolor vitae commodo magna dapibus sit amet.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="client-box bg-light mt-4">
                                    <div class="media">
                                        <div class="client-img">
                                            <img src="{{ asset('assets-guest/images/user/img-4.jpg') }}" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="media-body ml-3 mt-2">
                                            <h5 class="f-18">Brandon Carney</h5>
                                            <p class="text-primary mb-0">- Designer</p>
                                        </div>
                                        <div class="client-icon">
                                            <i class="mdi mdi-format-quote-close text-primary"></i>
                                        </div>
                                    </div>
                                    <p class="client-desc mt-4 mb-0 pt-1 f-18">
                                        Vestibulum mollis auctor aliquam dolor sit amet consectetur adipiscing elit Aenean volutpat vitae metus quis diam dolor lobortis eros conetur ligula odio a magna interdum Maecenas sit amet
                                        malesuada dolor vitae commodo magna dapibus sit amet.
                                    </p>
                                </div>
                            </div>
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

    <!-- START BLOG -->
    <section class="section bg-light" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Our Blog</p>
                        <h2 class="title-heading">Our latest blog posts insights articles</h2>
                        <p class="title-desc text-muted mt-2">Donec dapibus dolor at semper dictum phasellus fringilla sem risus mollis faucibus dolor eleifend id maecenas viverra.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-3">
                <div class="col-lg-4">
                    <div class="blog-box mt-4 bg-white">
                        <img src="{{ asset('assets-guest/images/blog/img-1.jpg') }}" class="img-fluid rounded" alt="" />

                        <div class="blog-contain p-4">
                            <div class="blog-user-box bg-white rounded">
                                <div class="media">
                                    <div class="blog-user">
                                        <img src="{{ asset('assets-guest/images/user/img-1.jpg') }}" class="img-fluid rounded" alt="" />
                                    </div>
                                    <div class="media-body ml-3">
                                        <h5 class="f-13 mb-1">Derek Monroe</h5>
                                        <p class="text-primary f-10 mb-0 font-weight-600"><i class="mdi mdi-calender"></i>15 Sep 2020</p>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-4"><a href="" class="text-dark f-18">Phasellus sit amet tempus risus consectetur lobortis elementum elit commodo.</a></h5>

                            <div class="mt-4 f-14">
                                <p class="mb-0">
                                    <a href="" class="text-dark"><i class="mdi mdi-forum-outline ml-2 text-primary mr-2 f-16"></i>45 Comment</a>
                                    <a href="" class="text-dark ml-4"><i class="mdi mdi-eye-outline ml-2 text-primary mr-2 f-16"></i>256 Views</a>
                                </p>
                            </div>

                            <div class="mt-4">
                                <a href="" class="btn btn-primary btn-sm">Read more <i class="mdi mdi-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-box mt-4 bg-white">
                        <img src="{{ asset('assets-guest/images/blog/img-2.jpg') }}" class="img-fluid rounded" alt="" />

                        <div class="blog-contain p-4">
                            <div class="blog-user-box bg-white rounded">
                                <div class="media">
                                    <div class="blog-user">
                                        <img src="{{ asset('assets-guest/images/user/img-2.jpg') }}" class="img-fluid rounded" alt="" />
                                    </div>
                                    <div class="media-body ml-3">
                                        <h5 class="f-13 mb-1">Derek Monroe</h5>
                                        <p class="text-primary f-10 mb-0 font-weight-600"><i class="mdi mdi-calender"></i>21 Sep 2020</p>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-4"><a href="" class="text-dark f-18"> Fusce vestibulum porta egestas phasellus laoreet lacaus rutrum vitae eleifend laoreet.</a></h5>

                            <div class="mt-4 f-14">
                                <p class="mb-0">
                                    <a href="" class="text-dark"><i class="mdi mdi-forum-outline ml-2 text-primary mr-2 f-16"></i>63 Comment</a>
                                    <a href="" class="text-dark ml-4"><i class="mdi mdi-eye-outline ml-2 text-primary mr-2 f-16"></i>265 Views</a>
                                </p>
                            </div>

                            <div class="mt-4">
                                <a href="" class="btn btn-primary btn-sm">Read more <i class="mdi mdi-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-box mt-4 bg-white">
                        <img src="{{ asset('assets-guest/images/blog/img-3.jpg') }}" class="img-fluid rounded" alt="" />

                        <div class="blog-contain p-4">
                            <div class="blog-user-box bg-white rounded">
                                <div class="media">
                                    <div class="blog-user">
                                        <img src="{{ asset('assets-guest/images/user/img-3.jpg') }}" class="img-fluid rounded" alt="" />
                                    </div>
                                    <div class="media-body ml-3">
                                        <h5 class="f-13 mb-1">
                                            Brandon Carney
                                        </h5>
                                        <p class="text-primary f-10 mb-0 font-weight-600"><i class="mdi mdi-calender"></i>24 Sep 2020</p>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-4"><a href="" class="text-dark f-18">Maecenas lobortis sem ultricies vestibulum duari purus mauris congue agittis risus.</a></h5>

                            <div class="mt-4 f-14">
                                <p class="mb-0">
                                    <a href="" class="text-dark"><i class="mdi mdi-forum-outline ml-2 text-primary mr-2 f-16"></i>76 Comment</a>
                                    <a href="" class="text-dark ml-4"><i class="mdi mdi-eye-outline ml-2 text-primary mr-2 f-16"></i>451 Views</a>
                                </p>
                            </div>

                            <div class="mt-4">
                                <a href="" class="btn btn-primary btn-sm">Read more <i class="mdi mdi-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BLOG -->

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
                            Business opportunities Are Like <br />
                            Buses, There's Always Another <br />
                            One Coming...
                        </h5>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mt-4">
                                <h5 class="f-18">Features</h5>
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="">6 Home </a></li>
                                    <li><a href="">Technology</a></li>
                                    <li><a href="">News & Events</a></li>
                                    <li><a href="">Company</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mt-4">
                                <h5 class="f-18">Policies</h5>
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="">Security</a></li>
                                    <li><a href="">Jobs</a></li>
                                    <li><a href="">Policy</a></li>
                                    <li><a href="">Condition</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mt-4">
                                <h5 class="f-18">Company</h5>
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="">Leadership</a></li>
                                    <li><a href="">Careers</a></li>
                                    <li><a href="">Contact us</a></li>
                                    <li><a href="">Maps</a></li>
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

                        <h5 class="f-18">Follow Us</h5>

                        <div class="mt-4">
                            <a href="" class="pr-3">
                                <img src="{{ asset('assets-guest/images/apple-store.png') }}" height="30" alt="" />
                            </a>
                            <a href="">
                                <img src="{{ asset('assets-guest/images/google-play.png') }}" height="30" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5" />

            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="text-muted mb-0">2020 © Floaks. Design by Themesdesign</p>
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

    <!-- counter init -->
    <script src="{{ asset('assets-guest/js/counter.init.js') }}"></script>

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
</body>
</html>
