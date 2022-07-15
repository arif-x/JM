@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Profil</h3>
                <hr>
                <div>
                    <div class="col-md-12 mb-3">
                        <div class="text-center">
                            <h3>Paket Anda Saat Ini</h3>
                            <div class="mt-1">
                                @foreach($paket_aktifs as $paket_aktif)
                                @if(!empty($paket_aktif->nama_paket))
                                <h5 class="text-primary mt-1">{{ $paket_aktif->nama_paket }}<span class="f-14 text-muted"></span></h5>
                                <h5 class="f-16 mb-2">Aktif sampai dengan {{ $paket_aktif->tgl_limit }}</h5>
                                @else
                                <h5 class="text-primary mt-1">Gratis<span class="f-14 text-muted"></span></h5>
                                <h5 class="f-16 mb-2">Aktif sampai dengan -</h5>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr>

                    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-akun" aria-selected="true" style="color:black">
                                Profil Akun
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-pass-tab" data-toggle="pill" href="#pills-pass" role="tab" aria-controls="pills-pass" aria-selected="false" style="color:black">
                                Ubah Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-ref-tab" data-toggle="pill" href="#pills-ref" role="tab" aria-controls="pills-ref" aria-selected="false" style="color:black">
                                Referral
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="pills-tabContent">

                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form action="{{ route('user.profil.profil') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control fw-600" id="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}" name="nama_lengkap">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="no_hp">Nomor HP.</label>
                                            <input type="text" class="form-control fw-600" id="no_hp" value="{{ Auth::user()->no_hp }}" name="no_hp">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="id_universitas">Universitas</label>
                                            <select class="form-control" name="id_universitas" id="id_universitas" value="{{ Auth::user()->id_universitas }}">
                                                <option value="" disabled>Pilih</option>
                                                @foreach($universitas as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold" type="submit">
                                    Simpan Info Akun
                                </button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-pass" role="tabpanel" aria-labelledby="pills-pass-tab">
                            <form action="{{ route('user.profil.password') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Password Lama</label>
                                    <input type="password" placeholder="Password Lama" class="form-control fw-600" name="old_password">
                                </div>
                                <div class="form-group">
                                    <label for="">Password Baru</label>
                                    <input type="password" placeholder="Password Baru" class="form-control fw-600" name="new_password">
                                </div>
                                <button class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold">Ganti Password</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-ref" role="tabpanel" aria-labelledby="pills-ref-tab">

                            <div class="container">
                                <div class="card bg-gradient-primary text-white card-shadow-info">
                                    <div class="card-body">
                                        <h4>Saldo Komisi</h4>
                                        <div class="d-flex justify-content-between">
                                            <span class="mdi mdi-wallet-outline" style="font-size: 30px;">
                                            </span>
                                            <h2 class="mb-0">{{ "Rp. ".number_format($total_saldo, 0) }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode Referral Anda</label>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <input type="text" id="kode_ref" class="form-control" value="{{ $ref }}" disabled>
                                                    <span id="kode_alert" class="text-primary help-inline d-none">Kode referral telah disalin!</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-primary w-100" onclick="kode()">Salin</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Link Referral Anda</label>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <input type="text" id="link_ref" class="form-control" value="{{ route('register') }}?referrer={{ $ref }}" disabled>
                                                    <span id="link_alert" class="text-primary help-inline d-none">Link referral telah disalin!</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-primary w-100" onclick="link()">Salin</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $("#id_universitas").select2({
        theme: "bootstrap4",
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
<script type="text/javascript">
    function kode() {
        var copyText = document.getElementById("kode_ref");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        document.getElementById("kode_alert").classList.remove("d-none");
        document.getElementById("kode_alert").classList.add("d-block");
        document.getElementById("link_alert").classList.remove("d-block");
        document.getElementById("link_alert").classList.add("d-none");
    }
</script>
<script type="text/javascript">
    function link() {
        var copyText = document.getElementById("link_ref");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        document.getElementById("link_alert").classList.remove("d-none");
        document.getElementById("link_alert").classList.add("d-block");
        document.getElementById("kode_alert").classList.remove("d-block");
        document.getElementById("kode_alert").classList.add("d-none");
    }
</script>

@endsection