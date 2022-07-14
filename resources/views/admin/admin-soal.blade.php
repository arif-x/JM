@extends('layouts.admin')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h6 class="card-title">Admin Soal</h6>
                <div class="card-description">
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Admin Soal</th>
                                <th>Email</th>
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
                                        <input type="hidden" name="id_admin_soal" id="id_admin_soal">

                                        <div class="form-group">
                                            <label for="nama_lengkap" class="control-label">Nama lengkap Admin Soal</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="control-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required="">
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="control-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required="">
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
                                    <input type="hidden" name="id_admin_soal" id="id_admin_soal_delete">
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
                                ajax: "{{ route('admin.admin-soal.index') }}",
                                columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                {data: 'nama_lengkap', name: 'nama_lengkap'},
                                {data: 'email', name: 'email'},
                                {data: 'action', name: 'action'},
                                ]
                            });

                            $('#tambah').click(function () {
                                $('#saveBtn').val("save");
                                $('#id_admin_soal').val('');
                                $('#theForm').trigger("reset");
                                $('#theModalHeading').html("Tambah Data");
                                $('#theModal').modal('show');
                            });

                            $('body').on('click', '.edit-data', function () {
                                var id_admin_soal = $(this).data('id');
                                $.get("{{ route('admin.admin-soal.index') }}" +'/' + id_admin_soal + '', function (data) {
                                    $('#theModalHeading').html("Edit");
                                    $('#saveBtn').val("save");
                                    $('#id_admin_soal').val(data.id_admin_soal);
                                    $('#nama_lengkap').val(data.nama_lengkap);
                                    $('#theModal').modal('show');
                                })
                            });

                            $('body').on('click', '.delete-data', function () {
                                var id_admin_soal = $(this).data('id');
                                $.get("{{ route('admin.admin-soal.index') }}" +'/' + id_admin_soal + '', function (data) {
                                    $('#theModalDeleteHeading').html("Hapus");
                                    $('#saveDeteleBtn').val("delete");
                                    $('#id_admin_soal_delete').val(data.id_admin_soal);
                                    $('#theDeleteModal').modal('show');
                                })
                            });

                            $('#saveBtn').click(function (e) {
                                e.preventDefault();
                                $(this).html('Simpan');

                                $.ajax({
                                    data: $('#theForm').serialize(),
                                    url: "{{ route('admin.admin-soal.store') }}",
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
                                var id_admin_soal = $('#id_admin_soal_delete').val();
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.admin-soal.store') }}"+'/'+id_admin_soal,
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