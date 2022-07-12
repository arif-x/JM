@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Program Apresiasi Jalur Mandiri</h3>
                <hr>
                <div class="owl-carousel owl-theme owl-fadeout">
                    @foreach($slider_besars as $slider_besar)
                    <div class="item">
                        <img src="{{ $slider_besar->img }}">
                    </div>
                    @endforeach
                </div>
                <div class="alert alert-primary mt-4">
                    <p>
                        <i class="fas fa-info-circle" aria-hidden="true"></i>
                        <strong>INFO:</strong>
                    </p>
                    <li class="card-text">
                        <strong>INFO - </strong> Follow Instagram @JalurMandiri untuk
                        update informasi seputar Jalur Mandiri dan layanan.
                    </li>
                    <li class="card-text">
                        <strong>HIMBAUAN - </strong> Kami sarankan akses
                        menggunakan browser Chrome versi terbaru supaya lancar dan
                        tidak ada kendala.
                    </li>
                    <li class="card-text">
                        @foreach($kontaks as $kontak)
                        <strong>BANTUAN - </strong> Jika anda mengalami kendala segera hubungi admin melalui email <strong>{{ $kontak->email }}</strong> atau WhatsApp
                        <strong> <u>{{ $kontak->no_hp }}</u></strong> untuk respon lebih cepat.
                        @endforeach
                    </li>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                        <a href="packetSKD" class="card bg-gradient-primary text-white text-center card-shadow-info">
                            <div class="card-body">
                                <h2 class="mb-0">{{ $materi }}</h2>
                                <h6 class="font-weight-medium">Materi</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                        <a href="packetSKD" class="card bg-gradient-danger text-white text-center card-shadow-danger">
                            <div class="card-body">
                                <h2 class="mb-0">{{ $soal_latihan }}</h2>
                                <h6 class="font-weight-medium">
                                    Soal Latihan
                                </h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                        <a href="packetSKD" class="card bg-gradient-warning text-white text-center card-shadow-warning">
                            <div class="card-body">
                                <h2 class="mb-0">{{ $soal_tryout }}</h2>
                                <h6 class="font-weight-medium">Soal Tryout</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme owl-basic">
                    @foreach($slider_kecils as $slider_kecil)
                    <div class="item">
                        <img src="{{ $slider_kecil->img }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection