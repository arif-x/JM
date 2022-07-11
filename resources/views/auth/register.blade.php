@extends('layouts.auth')

@section('content')


<div class="page-content d-flex align-items-center justify-content-center">

    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 pr-md-0">
                      <div class="auth-left-wrapper">

                      </div>
                  </div>
                  <div class="col-md-8 pl-md-0">
                      <div class="auth-form-wrapper px-4 py-5">
                        <a href="#" class="noble-ui-logo d-block mb-2">Jalur<span> Mandiri</span></a>
                        <h5 class="text-muted font-weight-normal mb-4">Selamat Datang! Daftar Sekarang!.</h5>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nama_lengkap" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp" class="col-form-label text-md-end">No HP.</label>
                                        <input id="no_hp" type="text" class="form-control" name="no_hp" required autocomplete="no_hp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-md-end">{{ __('Email') }}</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_universitas" class="col-form-label text-md-end">Universitas</label>
                                        <select class="form-control" name="id_universitas" id="id_universitas" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($universitas as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>
                            </div>

                            <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Sudah Mendaftar? Login Sekarang!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
