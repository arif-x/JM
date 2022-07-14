@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Beli Paket</h3>
                <hr>
                <div class="col-md-12 mb-3">
                    @if ($message = Session::get('upgrade'))
                    <div class="alert alert-primary alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
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
                <section class="section" id="pricing">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">
                                        <div class="row">
                                            @foreach($pakets as $paket)
                                            <div class="col-lg-4 mb-3">
                                                <div class="pricing-box shadow rounded h-100">
                                                    @if($paket->nama_paket == 'Premium')
                                                    <div class="pricing-badge">
                                                        <span class="badge">Featured</span>
                                                    </div>
                                                    @endif
                                                    <h5>{{ $paket->nama_paket }}</h5>

                                                    <div class="mt-4 text-center pb-2">
                                                        @if($paket->diskon == 0)
                                                        <h3 class="text-primary mt-4">{{ "Rp. ".number_format($paket->harga, 0) }}</h3>
                                                        @else
                                                        <s>{{ "Rp. ".number_format($paket->harga, 0) }}</s>
                                                        <h3 class="text-primary mt-4">{{ "Rp. ".number_format($paket->jumlah, 0) }}</h3>
                                                        @endif
                                                        <h5 class="f-16 mb-2">Per Semester</h5>
                                                    </div>

                                                    <hr>
                                                    <div class="mt-4 pt-2">
                                                        @php
                                                        $keterangan_akses = explode(', ', $paket->keterangan_akses);
                                                        $keterangan_no_akses = explode(', ', $paket->keterangan_no_akses);
                                                        @endphp
                                                        @if(count($keterangan_akses) > 1)
                                                        @foreach($keterangan_akses as $akses)
                                                        <p class="mb-2"><i class="mdi mdi-check-box-outline text-primary f-18 mr-2"></i>{{ $akses }}</p>
                                                        @endforeach
                                                        @endif
                                                        @if(count($keterangan_no_akses) > 1)
                                                        @foreach($keterangan_no_akses as $no_akses)
                                                        <p class="mb-2"><i class="mdi mdi-close-box-outline text-danger f-18 mr-2"></i>{{ $no_akses }}</p>
                                                        @endforeach
                                                        @endif
                                                    </div>

                                                    <div class="mt-4 pt-3 text-center">
                                                        @if($paket->nama_paket == 'Gratis')
                                                        <button class="btn btn-outline-primary">Gratis</button>
                                                        @else
                                                        <button id="paket-btn" data-id="{{ $paket->id_paket }}" class="btn btn-outline-primary">Pesan Sekarang</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="theModal" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="theModalHeading"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('user.paket.pesan') }}">
                                            @csrf
                                            <input type="hidden" name="id_paket" id="id_paket">
                                            <h4 class="mb-3">Ingin Memesan Paket Ini?</h4>
                                            <div class="form-group">
                                                <label for="id_kategori">Pilih Kategori Kategori</label>
                                                <select class="form-control" id="id_kategori" name="id_kategori" required>
                                                    <option value="" disabled selected>Pilih</option>
                                                    @foreach($kategori as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100" id="saveBtn" value="save">Pesan Sekarang</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('body').on('click', '#paket-btn', function () {
        var id_paket = $(this).data('id');
        $.get("{{ route('user.paket') }}" +'/' + id_paket + '', function (data) {
            $('#theModalHeading').html("Pesan Paket " + data.nama_paket);
            $('#saveBtn').val("save");
            $('#id_paket').val(data.id_paket);
            $('#theModal').modal('show');
        })
    });
</script>

@endsection