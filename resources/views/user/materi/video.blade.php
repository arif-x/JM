@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Materi</h3>
                <p>Berikut daftar materi yang harus dipelajari.</p>
                <hr>
                <h5 class="mb-3">Pilih Kategori Materi</h5>
                <p>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary active" id="tps-section-tab" data-toggle="pill" href="#tps-section" role="tab" aria-controls="tps-section" aria-selected="true">TPS</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary" id="tka-section-tab" data-toggle="pill" href="#tka-section" role="tab" aria-controls="tka-section" aria-selected="true">TKA</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary" id="inggris-section-tab" data-toggle="pill" href="#inggris-section" role="tab" aria-controls="inggris-section" aria-selected="false">Bahasa Inggris</a>
                        </li>
                    </ul>
                </p>
                <hr>
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade active show" id="tps-section" role="tabpanel" aria-labelledby="tps-section-tab">
                        <div class="row">
                            @foreach($tps as $materi)
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mr-3"><i data-v-364b0f72="" class="mdi mdi-cancel icon-md"></i></div>
                                            <div class="ml-3">
                                                <h5 class="mt-2 mb-0 card-text">
                                                    {{ $materi->nama_label }} - {{ $materi->judul_materi }}
                                                </h5>
                                                <p>{{ $materi->deskripsi }}</p>
                                                <a href="{{ route('user.materi.video.single', $materi->slug_materi) }}" class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3">Putar Video</a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tka-section" role="tabpanel" aria-labelledby="tka-section-tab">
                        <div class="row">
                            @foreach($tka as $materi)
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mr-3"><i data-v-364b0f72="" class="mdi mdi-cancel icon-md"></i></div>
                                            <div class="ml-3">
                                                <h5 class="mt-2 mb-0 card-text">
                                                    {{ $materi->nama_label }} - {{ $materi->judul_materi }}
                                                </h5>
                                                <p>{{ $materi->deskripsi }}</p>
                                                <a href="{{ route('user.materi.video.single', $materi->slug_materi) }}" class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3">Putar Video</a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="inggris-section" role="tabpanel" aria-labelledby="inggris-section-tab">
                        <div class="row">
                            @foreach($inggris as $materi)
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mr-3"><i data-v-364b0f72="" class="mdi mdi-cancel icon-md"></i></div>
                                            <div class="ml-3">
                                                <h5 class="mt-2 mb-0 card-text">
                                                    {{ $materi->nama_label }} - {{ $materi->judul_materi }}
                                                </h5>
                                                <p>{{ $materi->deskripsi }}</p>
                                                <a href="{{ route('user.materi.video.single', $materi->slug_materi) }}" class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3">Putar Video</a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
