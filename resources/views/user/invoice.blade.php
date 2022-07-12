@extends('layouts.user')

@section('content')

<div class="page-content">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Invoice & Pembayaran</h3>
                <hr>
                <div class="alert alert-warning d-inline-block">
                    <p>
                        <i class="fas fa-info-circle mr-2" aria-hidden="true"></i><strong>Pemberitahuan:</strong>
                    </p>
                    <li>
                        Lakukan pembayaran sesuai dengan jumlah tagihan sebelum jam 00.00. ke:
                        @foreach($rekenings as $rekening)
                        <ul>
                            <li>Bank: {{ $rekening->nama_bank }}</li>
                            <li>No. Rekening: {{ $rekening->no_rekening }}</li>
                            <li>Atas Nama:  {{ $rekening->atas_nama }}</li>
                        </ul>
                        @endforeach
                    </li>
                    <li>Unggah bukti pembayaran Anda untuk verifikasi pembayaran</li>
                    <li>Apabila dalam waktu <strong>30 menit</strong> setelah melakukan pembayaran namun pembayaran belum terkonfirmasi, silahkan hubungi admin
                        <br>
                        @foreach($kontaks as $kontak)
                        melalui email <strong><a href="mailto:{{ $kontak->email }}">{{ $kontak->email }}</a></strong> atau WhatsApp
                        <strong> <u><a href="https://wa.me/{{ $kontak->no_hp }}">+{{ $kontak->no_hp }}</a></u></strong>
                        dengan mengirimkan bukti transaksi
                        @endforeach
                    </li>
                    <li>Cek secara berkala untuk update pembayaran</li>
                </div>
                <hr>
                <p>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary active" id="wait-section-tab" data-toggle="pill" href="#wait-section" role="tab" aria-controls="wait-section" aria-selected="true">Menunggu Pembayaran</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary" id="pending-section-tab" data-toggle="pill" href="#pending-section" role="tab" aria-controls="pending-section" aria-selected="true">Pending Pembayaran</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary" id="reject-section-tab" data-toggle="pill" href="#reject-section" role="tab" aria-controls="reject-section" aria-selected="false">Pembayaran Ditolak</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mr-2 pr-4 pl-4 btn-outline-primary" id="success-section-tab" data-toggle="pill" href="#success-section" role="tab" aria-controls="success-section" aria-selected="false">Pembayaran Sukses</a>
                        </li>
                    </ul>
                </p>

                <div class="mt-3">
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade active show" id="wait-section" role="tabpanel" aria-labelledby="wait-section-tab">
                            <div class="row">
                                @foreach($waits as $wait)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6"><h5>Kode</h5></div>
                                                <div class="col-md-6"><h5>: {{ $wait->kode }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Paket</h5></div>
                                                <div class="col-md-6"><h5>: {{ $wait->nama_paket }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Harga</h5></div>
                                                <div class="col-md-6"><h5>: {{ $wait->harga }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Jenis Kampus</h5></div>
                                                <div class="col-md-6"><h5>: {{ $wait->nama_jenis_kampus }}</h5></div>
                                            </div>
                                            <button data-id="{{ $wait->id_keranjang }}" id="bayar-btn" class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3">Bayar Sekarang</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="modal fade" id="theModal" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="theModalHeading"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('user.invoice.bayar') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_keranjang" id="id_keranjang">
                                            <h4 class="mb-3">Bayar</h4>
                                            <div class="form-group">
                                                <label for="bukti_pembayaran">Unggah Bukti Pembayaran</label>
                                                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3" id="saveBtn" value="save">Bayar Sekarang</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                            $('body').on('click', '#bayar-btn', function () {
                                var id_keranjang = $(this).data('id');
                                $.get("{{ route('user.invoice') }}" +'/' + id_keranjang + '', function (data) {
                                    $('#theModalHeading').html("Bayar Paket " + data.nama_paket);
                                    $('#saveBtn').val("save");
                                    $('#id_keranjang').val(data.id_keranjang);
                                    $('#theModal').modal('show');
                                })
                            });
                        </script>

                        <div class="tab-pane fade" id="pending-section" role="tabpanel" aria-labelledby="pending-section-tab">
                            <div class="row">
                                @foreach($pendings as $pending)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ $pending->bukti_pembayaran }}" alt="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6"><h5>Kode</h5></div>
                                                <div class="col-md-6"><h5>: {{ $pending->kode }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Paket</h5></div>
                                                <div class="col-md-6"><h5>: {{ $pending->nama_paket }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Harga</h5></div>
                                                <div class="col-md-6"><h5>: {{ $pending->harga }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Jenis Kampus</h5></div>
                                                <div class="col-md-6"><h5>: {{ $pending->nama_jenis_kampus }}</h5></div>
                                            </div>
                                            <button class="btn btn-inverse-primary btn-fw ml-0 font-weight-bold col mt-3">Pembayaran Pending!</button>
                                            <p class="card-text mt-2">Silahkan Hubungi <u><a href="https://wa.me/6281357993755">Admin</a></u></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reject-section" role="tabpanel" aria-labelledby="reject-section-tab">
                            <div class="row">
                                @foreach($rejects as $reject)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ $reject->bukti_pembayaran }}" alt="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6"><h5>Kode</h5></div>
                                                <div class="col-md-6"><h5>: {{ $reject->kode }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Paket</h5></div>
                                                <div class="col-md-6"><h5>: {{ $reject->nama_paket }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Harga</h5></div>
                                                <div class="col-md-6"><h5>: {{ $reject->harga }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Jenis Kampus</h5></div>
                                                <div class="col-md-6"><h5>: {{ $reject->nama_jenis_kampus }}</h5></div>
                                            </div>
                                            <button class="btn btn-inverse-danger btn-fw ml-0 font-weight-bold col mt-3">Pembayaran Ditolak!</button>
                                            <p class="card-text mt-2">Silahkan Hubungi <u><a href="https://wa.me/6281357993755">Admin</a></u></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="success-section" role="tabpanel" aria-labelledby="success-section-tab">
                            <div class="row">
                                @foreach($successes as $success)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ $success->bukti_pembayaran }}" alt="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6"><h5>Kode</h5></div>
                                                <div class="col-md-6"><h5>: {{ $success->kode }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Paket</h5></div>
                                                <div class="col-md-6"><h5>: {{ $success->nama_paket }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Harga</h5></div>
                                                <div class="col-md-6"><h5>: {{ $success->harga }}</h5></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><h5>Jenis Kampus</h5></div>
                                                <div class="col-md-6"><h5>: {{ $success->nama_jenis_kampus }}</h5></div>
                                            </div>
                                            <button class="btn btn-inverse-success btn-fw ml-0 font-weight-bold col mt-3">Pembayaran Dikonfirmasi!</button>
                                            <p class="card-text mt-2">Silahkan Hubungi <u><a href="https://wa.me/6281357993755">Admin</a></u></p>
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
</div>

@endsection