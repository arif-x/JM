@extends('layouts.auth')

@section('content')

<div class="page-content d-flex align-items-center justify-content-center">

    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
                  <div class="col-md-12">
                      <div class="auth-form-wrapper px-4 py-5">
                        <a href="/" class="noble-ui-logo d-block mb-2">Jalur<span>Mandiri</span></a>
                        <h5 class="text-muted font-weight-normal mb-4">Selamat Datang! Verifikasi Email Anda.</h5>
                        <hr>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        Kirim Email
                                    </button>
                                </div>
                            </div>
                            <a href="/" class="text-muted">Kembali ke Halaman Awal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
