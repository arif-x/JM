@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Tryout</h3>
                <p>Belajar manajemen waktu untuk mengerjakan soal sesuai kategori yang diinginkan.</p>
                <hr>
                <div data-v-69d2682d="" class="alert alert-warning"><strong data-v-69d2682d=""><i data-v-69d2682d="" class="mdi mdi-information mr-0"></i> Perhatian!</strong> Gunakan browser Google Chrome versi terbaru supaya website dapat diakses dengan lancar tanpa masalah. </div>
                <h5 class="mb-3">Pilih Kategori Tryout</h5>
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
                            @foreach($tps as $soal)
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header"><h4 class="text-primary"><strong>{{ $soal->nama_label }}</strong></h4></div>
                                    <div class="card-body">
                                        <button class="btn btn-primary col" disabled="">{{ $soal->nama_paket }}</button>
                                        <p class="mt-2 mb-0 text-muted card-text">
                                            Jumlah Soal: {{ $soal->counts }} soal
                                        </p>
                                        <p class="mt-2 mb-0 text-muted card-text">
                                            Waktu: 15 menit
                                        </p>
                                        <button class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3" data-slug="{{ $soal->slug }}" onclick="tryout(this);" id="kerjakan">Kerjakan</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tka-section" role="tabpanel" aria-labelledby="tka-section-tab">
                        <div class="row">
                            @foreach($tka as $soal)
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header"><h4 class="text-primary"><strong>{{ $soal->nama_label }}</strong></h4></div>
                                    <div class="card-body">
                                        <button class="btn btn-primary col" disabled="">{{ $soal->nama_paket }}</button>
                                        <p class="mt-2 mb-0 text-muted card-text">
                                            Jumlah Soal: {{ $soal->counts }} soal
                                        </p>
                                        <p class="mt-2 mb-0 text-muted card-text">
                                            Waktu: 15 menit
                                        </p>
                                        <button class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3" data-slug="{{ $soal->slug }}" onclick="tryout(this);" id="kerjakan">Kerjakan</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="inggris-section" role="tabpanel" aria-labelledby="inggris-section-tab">
                        <div class="row">
                            @foreach($inggris as $soal)
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header"><h4 class="text-primary"><strong>{{ $soal->nama_label }}</strong></h4></div>
                                    <div class="card-body">
                                        <button class="btn btn-primary col" disabled="">{{ $soal->nama_paket }}</button>
                                        <p class="mt-2 mb-0 text-muted card-text">
                                            Jumlah Soal: {{ $soal->counts }} soal
                                        </p>
                                        <p class="mt-2 mb-0 text-muted card-text">
                                            Waktu: 15 menit
                                        </p>
                                        <button class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3" data-slug="{{ $soal->slug }}" onclick="tryout(this);" id="kerjakan">Kerjakan</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                @php echo $modal; @endphp
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function tryout(obj){
        $('#warningModal').modal('show');
        $('#kerjakanBtn').attr('href', '/user/tryout/persiapan/'+$(obj).data('slug'))
        $('#kerjakanInput').val($(obj).data('slug'))
        $('#kerjakanInput').hide()
        $('#formId').attr('action', '/user/tryout/persiapan/'+$(obj).data('slug'));
    }
</script>

@endsection
