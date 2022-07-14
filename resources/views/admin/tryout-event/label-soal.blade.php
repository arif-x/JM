@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Label Soal Event Tryout</h6>
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
                                <th>Jenis Kampus</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl End</th>
                                <th>Kupon</th>
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
                                        <input type="hidden" name="id_label_soal_tryout_event" id="id_label_soal_tryout_event">

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
                                            <label for="id_jenis_kampus" class="control-label">Jenis Kampus</label>
                                            <select class="form-control" name="id_jenis_kampus" id="id_jenis_kampus">
                                                <option value="" disabled selected>Pilih</option>
                                                @foreach($jenis_kampus as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_mulai" class="control-label">Tanggal Mulai</label>
                                            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control">
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tgl_end" class="control-label">Tanggal Selesai</label>
                                            <input type="date" name="tgl_end" id="tgl_end" class="form-control">
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="kupon" class="control-label">Kupon</label>
                                            <input type="text" name="kupon" id="kupon" class="form-control">
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
                                    <input type="hidden" name="id_label_soal_tryout_event" id="id_label_soal_tryout_event_delete">
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
                                ajax: "{{ route('admin.event-tryout.label-soal.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'id_label_soal_tryout_event', name: 'id_label_soal_tryout_event'},
                                {data: 'nama_label', name: 'nama_label'},
                                {data: 'nama_paket', name: 'nama_paket'},
                                {data: 'nama_kategori', name: 'nama_kategori'},
                                {data: 'nama_jenis_kampus', name: 'nama_jenis_kampus'},
                                {data: 'tanggal_mulai', name: 'tanggal_mulai'},
                                {data: 'tanggal_end', name: 'tanggal_end'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_label_soal_tryout_event').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_label_soal_tryout_event = $(this).data('id');
                                $.get("{{ route('admin.event-tryout.label-soal.index') }}" +'/' + id_label_soal_tryout_event + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_label_soal_tryout_event').val(data.id_label_soal_tryout_event);
                                    $('#nama_label').val(data.nama_label);
                                    $('#id_paket').val(data.id_paket);
                                    $('#id_kategori').val(data.id_kategori);
                                    $('#id_jenis_kampus').val(data.id_jenis_kampus);
                                    $('#tgl_mulai').val(data.tanggal_mulai);
                                    $('#tgl_end').val(data.tanggal_end);
                                    $('#kupon').val(data.kupon);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_label_soal_tryout_event = $(this).data('id');
                                $.get("{{ route('admin.event-tryout.label-soal.index') }}" +'/' + id_label_soal_tryout_event + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_label_soal_tryout_event_delete').val(data.id_label_soal_tryout_event);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: $('#theForm').serialize(),
                                    url: "{{ route('admin.event-tryout.label-soal.store') }}",
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
                                var id_label_soal_tryout_event = $('#id_label_soal_tryout_event_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.event-tryout.label-soal.store') }}"+'/'+id_label_soal_tryout_event,
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