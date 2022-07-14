@extends('layouts.auth')

@section('content')

<div class="page-content d-flex align-items-center justify-content-center">

    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 pr-md-0">
                      <div class="auth-left-wrapper" style="background-image: url({{url('/')}}/assets/images/img_login.png);">

                      </div>
                  </div>
                  <div class="col-md-8 pl-md-0">
                      <div class="auth-form-wrapper px-4 py-5">
                        <a href="/" class="noble-ui-logo d-block mb-2">Jalur<span>Mandiri</span></a>
                        <h5 class="text-muted font-weight-normal mb-4">Selamat Datang! Masuk ke Akun Anda.</h5>
                        <form method="POST" class="forms-sample" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                            <a class="d-block mt-3 text-muted" href="{{ route('password.request') }}">
                                Lupa Password?
                            </a>
                            @endif
                            <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Belum Mendaftar? Daftar Sekarang!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
