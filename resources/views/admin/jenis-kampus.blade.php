@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Jenis Universitas</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Jenis Universitas</th>
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
                                        <input type="hidden" name="id_jenis_kampus" id="id_jenis_kampus">

                                        <div class="form-group">
                                            <label for="nama_jenis_kampus" class="control-label">Nama Jenis Universitas</label>
                                            <input type="text" class="form-control" id="nama_jenis_kampus" name="nama_jenis_kampus" required="">
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
                                    <input type="hidden" name="id_jenis_kampus" id="id_jenis_kampus_delete">
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
                                ajax: "{{ route('admin.jenis-kampus.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'nama_jenis_kampus', name: 'nama_jenis_kampus'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_jenis_kampus').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_jenis_kampus = $(this).data('id');
                                $.get("{{ route('admin.jenis-kampus.index') }}" +'/' + id_jenis_kampus + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_jenis_kampus').val(data.id_jenis_kampus);
                                    $('#nama_jenis_kampus').val(data.nama_jenis_kampus);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_jenis_kampus = $(this).data('id');
                                $.get("{{ route('admin.jenis-kampus.index') }}" +'/' + id_jenis_kampus + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_jenis_kampus_delete').val(data.id_jenis_kampus);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: $('#theForm').serialize(),
                                    url: "{{ route('admin.jenis-kampus.store') }}",
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
                                var id_jenis_kampus = $('#id_jenis_kampus_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.jenis-kampus.store') }}"+'/'+id_jenis_kampus,
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