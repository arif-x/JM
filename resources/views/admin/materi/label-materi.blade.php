@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Label Materi</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Label Materi</th>
                                <th>Paket</th>
                                <th>Kategori</th>
                                <th>Jenis Materi</th>
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
                                        <input type="hidden" name="id_label_materi" id="id_label_materi">

                                        <div class="form-group">
                                            <label for="nama_label" class="control-label">Nama Label Materi</label>
                                            <input type="text" class="form-control" id="nama_label" name="nama_label" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_materi" class="control-label">Jenis Materi</label>
                                            <select class="form-control" name="jenis_materi" id="jenis_materi">
                                                <option value="" disabled selected>Pilih</option>
                                                <option value="1">TPS Teks</option>
                                                <option value="2">TPA Teks</option>
                                                <option value="3">Bahasa Inggris Teks</option>
                                                <option value="4">TPS Video</option>
                                                <option value="5">TPA Video</option>
                                                <option value="6">Bahasa Inggris Video</option>
                                            </select>
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
                                    <input type="hidden" name="id_label_materi" id="id_label_materi_delete">
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
                                ajax: "{{ route('admin.materi.label-materi.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'nama_label', name: 'nama_label'},
                                {data: 'nama_paket', name: 'nama_paket'},
                                {data: 'nama_kategori', name: 'nama_kategori'},
                                {data: 'jenis', name: 'jenis'},
                                {data: 'nama_jenis_kampus', name: 'nama_jenis_kampus'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_label_materi').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_label_materi = $(this).data('id');
                                $.get("{{ route('admin.materi.label-materi.index') }}" +'/' + id_label_materi + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_label_materi').val(data.id_label_materi);
                                    $('#nama_label').val(data.nama_label);
                                    $('#id_paket').val(data.id_paket);
                                    $('#id_kategori').val(data.id_kategori);
                                    $('#jenis_materi').val(data.jenis_materi);
                                    $('#id_jenis_kampus').val(data.id_jenis_kampus);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_label_materi = $(this).data('id');
                                $.get("{{ route('admin.materi.label-materi.index') }}" +'/' + id_label_materi + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_label_materi_delete').val(data.id_label_materi);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: $('#theForm').serialize(),
                                    url: "{{ route('admin.materi.label-materi.store') }}",
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
                                var id_label_materi = $('#id_label_materi_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.materi.label-materi.store') }}"+'/'+id_label_materi,
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