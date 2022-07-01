@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Paket</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Paket</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Akses</th>
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
                                        <input type="hidden" name="id_paket" id="id_paket">

                                        <div class="form-group">
                                            <label for="nama_paket" class="control-label">Nama Paket</label>
                                            <input type="text" class="form-control" id="nama_paket" name="nama_paket" required="">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="harga" class="control-label">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="harga" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="diskon" class="control-label">Diskon</label>
                                                    <input type="number" class="form-control" id="diskon" name="diskon" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="akses" class="control-label">Akses</label>
                                            <input type="text" class="form-control" id="akses" name="akses" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan_akses" class="control-label">Keterangan Dapat Mengakses</label>
                                            <input type="text" class="form-control" id="keterangan_akses" name="keterangan_akses" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan_no_akses" class="control-label">Keterangan Tidak Dapat Mengakses</label>
                                            <input type="text" class="form-control" id="keterangan_no_akses" name="keterangan_no_akses" required="">
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100" id="saveBtn" value="create">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="theDeleteModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="theModalDeleteHeading"></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id_paket" id="id_paket_delete">
                                    <h4>Ingin Menghapus Data Ini?</h4>
                                    <button type="submit" class="btn btn-danger w-100" id="saveDeteleBtn" value="delete">Hapus</button>
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
                                ajax: "{{ route('admin.paket.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'nama_paket', name: 'nama_paket'},
                                {data: 'harga', name: 'harga'},
                                {data: 'diskon', name: 'diskon'},
                                {data: 'akses', name: 'akses'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_paket').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_paket = $(this).data('id');
                                $.get("{{ route('admin.paket.index') }}" +'/' + id_paket + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_paket').val(data.id_paket);
                                    $('#nama_paket').val(data.nama_paket);
                                    $('#harga').val(data.harga);
                                    $('#diskon').val(data.diskon);
                                    $('#akses').val(data.akses);
                                    $('#keterangan_akses').val(data.keterangan_akses);
                                    $('#keterangan_no_akses').val(data.keterangan_no_akses);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_paket = $(this).data('id');
                                $.get("{{ route('admin.paket.index') }}" +'/' + id_paket + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_paket_delete').val(data.id_paket);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: $('#theForm').serialize(),
                                    url: "{{ route('admin.paket.store') }}",
                                    type: "POST",
                                    dataType: 'json',
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

                            $('#saveDeteleBtn').click(function (e) {
                                var id_paket = $('#id_paket_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.paket.store') }}"+'/'+id_paket,
                                    success: function (data) {
                                        table.draw();
                                        $('#theDeleteModal').modal('hide');
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
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