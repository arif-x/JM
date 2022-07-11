@extends('layouts.auth')

@section('content')

<div class="page-content d-flex align-items-center justify-content-center">

    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 pr-md-0">
                      <div class="auth-left-wrapper">

                      </div>
                  </div>
                  <div class="col-md-8 pl-md-0">
                      <div class="auth-form-wrapper px-4 py-5">
                        <a href="#" class="noble-ui-logo d-block mb-2">Jalur<span>Mandiri</span></a>
                        <h5 class="text-muted font-weight-normal mb-4">Selamat Datang! Verifikasi Email Anda.</h5>
                        <hr>
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link Verifikasi Email Telah Dikirim!
                        </div>
                        @endif

                        Mohon Cek Email Anda & Klik Link Yang Telah Dikirim
                        Jika Belum Menerima Email,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Kirim Ulang Untuk Menerima Email Lagi</button>.
                        </form> Atau 
                        <a href="#" class="text" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
