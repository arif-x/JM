@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Label Soal Latihan</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Label Soal</th>
                                <th>Nama Label Soal</th>
                                <th>Paket</th>
                                <th>Kategori</th>
                                <th>Jenis Soal</th>
                                <th>Jenis Kampus</th>
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
                                        <input type="hidden" name="id_label_soal" id="id_label_soal">

                                        <div class="form-group">
                                            <label for="nama_label" class="control-label">Nama Label Soal</label>
                                            <input type="text" class="form-control" id="nama_label" name="nama_label" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="id_paket" class="control-label">Paket</label>
                                            <select class="form-control" name="id_paket" id="id_paket">
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach($paket as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_kategori" class="control-label">Kategori</label>
                                            <select class="form-control" name="id_kategori" id="id_kategori">
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach($kategori as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_jenis_soal" class="control-label">Jenis Soal</label>
                                            <select class="form-control" name="id_jenis_soal" id="id_jenis_soal">
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach($jenis_soal as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_jenis_kampus" class="control-label">Jenis Kampus</label>
                                            <select class="form-control" name="id_jenis_kampus" id="id_jenis_kampus">
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach($jenis_kampus as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
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
                                    <input type="hidden" name="id_label_soal" id="id_label_soal_delete">
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
                                ajax: "{{ route('admin.latihan.label-soal.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'id_label_soal', name: 'id_label_soal'},
                                {data: 'nama_label', name: 'nama_label'},
                                {data: 'nama_paket', name: 'nama_paket'},
                                {data: 'nama_kategori', name: 'nama_kategori'},
                                {data: 'jenis_soal', name: 'jenis_soal'},
                                {data: 'nama_jenis_kampus', name: 'nama_jenis_kampus'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_label_soal').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_label_soal = $(this).data('id');
                                $.get("{{ route('admin.latihan.label-soal.index') }}" +'/' + id_label_soal + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_label_soal').val(data.id_label_soal);
                                    $('#nama_label').val(data.nama_label);
                                    $('#id_paket').val(data.id_paket);
                                    $('#id_kategori').val(data.id_kategori);
                                    $('#id_jenis_soal').val(data.id_jenis_soal);
                                    $('#id_jenis_kampus').val(data.id_jenis_kampus);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_label_soal = $(this).data('id');
                                $.get("{{ route('admin.latihan.label-soal.index') }}" +'/' + id_label_soal + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_label_soal_delete').val(data.id_label_soal);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: $('#theForm').serialize(),
                                    url: "{{ route('admin.latihan.label-soal.store') }}",
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
                                var id_label_soal = $('#id_label_soal_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.latihan.label-soal.store') }}"+'/'+id_label_soal,
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