@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Status Pembayaran</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="exportTgl">Export Berdasarkan Tanggal</button>
                    <button class="btn btn-primary" id="exportBln">Export Berdasarkan Bulan</button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama User</th>
                                <th>Nama Paket</th>
                                <th>Jumlah (Rp.)</th>
                                <th>Tanggal Pesan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>  
                    </table>

                    <div class="modal fade" id="theModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="theModalHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <form id="theForm" name="theForm" class="form-horizontal">
                                        <input type="hidden" name="id_keranjang" id="id_keranjang">
                                        <input type="hidden" name="id_user" id="id_user">
                                        <input type="hidden" name="id_paket" id="id_paket">
                                        <input type="hidden" name="id_jenis_kampus" id="id_jenis_kampus">
                                        <input type="hidden" name="id_kategori" id="id_kategori">

                                        <div class="form-group">
                                            <label for="kode" class="control-label">Kode</label>
                                            <input type="text" class="form-control" readonly name="kode" id="kode">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_paket" class="control-label">Nama Paket</label>
                                            <input type="text" class="form-control" readonly name="nama_paket" id="nama_paket">
                                        </div>

                                        <div class="form-group">
                                            <label for="jumlah" class="control-label">Jumlah (Rp.)</label>
                                            <input type="text" class="form-control" readonly name="jumlah" id="jumlah">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_kategori" class="control-label">Nama Kategori</label>
                                            <input type="text" class="form-control" readonly name="nama_kategori" id="nama_kategori">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_jenis_kampus" class="control-label">Jenis Kampus</label>
                                            <input type="text" class="form-control" readonly name="nama_jenis_kampus" id="nama_jenis_kampus">
                                        </div>

                                        <div class="form-group">
                                            <label for="bukti" class="control-label">Bukti Bayar</label>
                                            <input type="file" class="form-control" readonly name="bukti" id="bukti">
                                        </div>

                                        <div class="form-group">
                                            <label for="bukti_pembayaran" class="control-label">Bukti Bayar</label>
                                            <br>
                                            <img src="" style="width: 100%; height: auto; max-width: 300px; display: block; margin-right: auto; margin-left: auto;" id="bukti_pembayaran">
                                        </div>

                                        <hr>

                                        <div class="form-group">
                                            <label for="status_pembayaran" class="control-label">Konfirmasi Status Pembayaran</label>
                                            <select class="form-control" name="status_pembayaran", id="status_pembayaran">
                                                <option value="2" disabled selected>Perlu Dikonfirmasi</option>
                                                <option value="3">Tolak</option>
                                                <option value="4">Konfirmasi</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100" id="saveBtn" value="create">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exportTglModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exportTglModalHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <form id="tglModalForm" name="tglModalForm" class="form-horizontal" action="{{ route('admin.export.pembayaran') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="tgl_awal" class="control-label">Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tgl_awal" id="tgl_awal">
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_akhir" class="control-label">Tanggal Akhir</label>
                                            <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir">
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100" id="exportTglbtn" value="create">Export</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exportBlnModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exportBlnModalHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <form id="blnModalForm" name="blnModalForm" class="form-horizontal" action="{{ route('admin.export.pembayaran') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="bulan" class="control-label">Bulan</label>
                                            <select class="form-control" id="bulan" name="bulan">
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100" id="exportTglbtn" value="create">Export</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="lihat_theModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="lihat_theModalHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <form id="theForm" name="theForm" class="form-horizontal">
                                        <input type="hidden" name="id_keranjang" id="lihat_id_keranjang">
                                        <input type="hidden" name="id_paket" id="lihat_id_paket">
                                        <input type="hidden" name="id_kategori" id="lihat_id_kategori">
                                        <input type="hidden" name="id_jenis_kampus" id="lihat_id_jenis_kampus">

                                        <div class="form-group">
                                            <label for="kode" class="control-label">Kode</label>
                                            <input type="text" class="form-control" readonly name="kode" id="lihat_kode">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_paket" class="control-label">Nama Paket</label>
                                            <input type="text" class="form-control" readonly name="nama_paket" id="lihat_nama_paket">
                                        </div>

                                        <div class="form-group">
                                            <label for="jumlah" class="control-label">Jumlah (Rp.)</label>
                                            <input type="text" class="form-control" readonly name="jumlah" id="lihat_jumlah">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_kategori" class="control-label">Nama Kategori</label>
                                            <input type="text" class="form-control" readonly name="nama_kategori" id="lihat_nama_kategori">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_jenis_kampus" class="control-label">Jenis Kampus</label>
                                            <input type="text" class="form-control" readonly name="nama_jenis_kampus" id="lihat_nama_jenis_kampus">
                                        </div>

                                        <div class="form-group">
                                            <label for="bukti_pembayaran" class="control-label">Bukti Bayar</label>
                                            <br>
                                            <img src="" style="width: 100%; height: auto; max-width: 300px; display: block; margin-right: auto; margin-left: auto;" id="lihat_bukti_pembayaran">
                                        </div>

                                        <hr>

                                        <div class="form-group">
                                            <label for="status_pembayaran" class="control-label">Konfirmasi Status Pembayaran</label>
                                            <select class="form-control" name="status_pembayaran", id="lihat_status_pembayaran" disabled>
                                                <option value="3" disabled selected>Perlu Dikonfirmasi</option>
                                                <option value="4">Tolak</option>
                                                <option value="5">Konfirmasi</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(function () {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var table = $('#dataTableExample').DataTable({
                                processing: true,
                                serverSide: true,
                                paging: true,
                                ajax: "{{ route('admin.pembayaran.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'kode', name: 'kode'},
                                {data: 'nama_lengkap', name: 'nama_lengkap'},
                                {data: 'nama_paket', name: 'nama_paket'},
                                {data: 'jumlah', name: 'jumlah'},
                                {data: 'tgl_pesan', name: 'tgl_pesan'},
                                {data: 'status', name: 'status'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#exportTgl').click(function () {
                                $('#saveBtn').val("save");
                                $('#tglModalForm').trigger("reset");
                                $('#exportTglModalHeading').html("Export Data");
                                $('#exportTglModal').modal('show');
                            });

                            $('#exportBln').click(function () {
                                $('#saveBtn').val("save");
                                $('#blnModalForm').trigger("reset");
                                $('#exportBlnModalHeading').html("Export Data");
                                $('#exportBlnModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_keranjang = $(this).data('id');
                                $.get("{{ route('admin.pembayaran.index') }}" +'/' + id_keranjang + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_keranjang').val(data.id_keranjang);
                                    $('#id_user').val(data.id_user);
                                    $('#id_paket').val(data.id_paket);
                                    $('#kode').val(data.kode);
                                    $('#nama_paket').val(data.nama_paket);
                                    $('#jumlah').val(data.jumlah);
                                    $('#id_kategori').val(data.id_kategori);
                                    $('#id_jenis_kampus').val(data.id_jenis_kampus);
                                    $('#nama_kategori').val(data.nama_kategori);
                                    $('#nama_jenis_kampus').val(data.nama_jenis_kampus);
                                    $('#bukti_pembayaran').attr('src', data.bukti_pembayaran);
                                    $('#status_pembayaran').val(data.status_pembayaran);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.lihat-data', function () {
                                var id_keranjang = $(this).data('id');
                                $.get("{{ route('admin.pembayaran.index') }}" +'/' + id_keranjang + '', function (data) {
                                    $('#lihat_theModalHeading').html("Lihat");
                                    $('#lihat_id_keranjang').val(data.id_keranjang);
                                    $('#lihat_id_user').val(data.id_user);
                                    $('#lihat_id_paket').val(data.id_paket);
                                    $('#lihat_kode').val(data.kode);
                                    $('#lihat_nama_paket').val(data.nama_paket);
                                    $('#lihat_jumlah').val(data.jumlah);
                                    $('#lihat_nama_kategori').val(data.nama_kategori);
                                    $('#lihat_nama_jenis_kampus').val(data.nama_jenis_kampus);
                                    $('#lihat_id_kategori').val(data.id_kategori);
                                    $('#lihat_id_jenis_kampus').val(data.id_jenis_kampus);
                                    $('#lihat_bukti_pembayaran').attr('src', data.bukti_pembayaran);
                                    $('#lihat_status_pembayaran').val(data.status_pembayaran);
                                    $('#lihat_theModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');
                                let formData = new FormData(document.getElementById("theForm"));

                                $.ajax({
                                    data: formData,
                                    url: "{{ route('admin.pembayaran.store') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        $('#theForm').trigger("reset");
                                        $('#theModal').modal('hide');
                                        table.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                        $('#saveBtn').html('Simpan');
                                    }
                                });
                            });

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection