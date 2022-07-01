@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Program Apresiasi Jalur Mandiri</h3>
                <hr>
                <div class="owl-carousel owl-theme owl-fadeout">
                    <div class="item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBWUv20Ek96rYNT-WmllfxeY0NR6G5uSPE6A&usqp=CAU">
                    </div>
                    <div class="item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBWUv20Ek96rYNT-WmllfxeY0NR6G5uSPE6A&usqp=CAU">
                    </div>
                </div>
                <div class="alert alert-primary">
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
                                <h2 class="mb-0">1893</h2>
                                <h6 class="font-weight-medium">Soal Tes Wawasan Kebangsaan</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                        <a href="packetSKD" class="card bg-gradient-danger text-white text-center card-shadow-danger">
                            <div class="card-body">
                                <h2 class="mb-0">1015</h2>
                                <h6 class="font-weight-medium">
                                    Soal Tes Intelegensia Umum
                                </h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                        <a href="packetSKD" class="card bg-gradient-warning text-white text-center card-shadow-warning">
                            <div class="card-body">
                                <h2 class="mb-0">1030</h2>
                                <h6 class="font-weight-medium">Soal Tes Karakteristik Pribadi</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme owl-basic">
                  <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
                <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection